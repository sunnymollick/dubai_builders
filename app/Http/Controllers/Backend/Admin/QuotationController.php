<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\QuotationMail;
use App\Models\Backend\Item;
use App\Models\Backend\QuotationApplication;
use App\Models\Backend\QuotationDetails;
use App\Models\Backend\WorkCategory;
use App\Models\Frontend\Quotation;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class QuotationController extends Controller
{
    public function index()
    {
        $quotation_requests = Quotation::orderby('id', 'desc')->where('is_replied', 1)->get();
        return view('backend.pages.all_quotations.index', ['quotation_requests' => $quotation_requests]);
    }
    public function fetchItems($id)
    {
        $item_work = Item::where('work_category_id', $id)->get();

        // Fetch unit details for each item
        $itemsWithDetails = $item_work->map(function ($item) {
            $unit = $item->unit()->first(); // Assuming 'unit' is the name of the relationship
            // Add 'unit' details to the item
            $item->unit = $unit;
            return $item;
        });
        return response()->json(['items' => $itemsWithDetails]);
    }
    public function preview(Request $request)
    {
        if ($request->ajax()) {
            $path = "quotations";
            $rules = [
                'items' => 'required',
                'unit' => 'required',
                'unit_price' => 'required',
                'quantity' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {

                DB::beginTransaction();
                try {
                    // Get item_ids, quantities, and total_prices from the form data
                    $itemIds = $request->input('items');
                    $categoryIds = $request->input('work_category_id');
                    $unitPrices = $request->input('unit_price');
                    $quantities = $request->input('quantity');
                    $totalPrices = $request->input('total_price');
                    $discountAmount = $request->input('discount_amount');
                    $tax = $request->input('tax');
                    $grandTotal = $request->input('grand_total');

                    $subTotal = 0;
                    for ($i = 0; $i < count($totalPrices); $i++) {
                        $subTotal = $subTotal + $totalPrices[$i];
                    }
                    $afterDiscount = $subTotal - $discountAmount;
                    // Fetch items from the database based on item_ids
                    $items = Item::whereIn('id', $itemIds)->get();
                    $categories = WorkCategory::whereIn('id', $categoryIds)->get();

                    // Combine item data with quantities and total prices, grouped by category
                    $groupedData = [];
                    foreach ($items as $index => $item) {
                        $categoryId = $categoryIds[$index];

                        if (!isset($groupedData[$categoryId])) {
                            $groupedData[$categoryId] = [
                                'category' => $categories->firstWhere('id', $categoryId),
                                'items' => [],
                            ];
                        }

                        $groupedData[$categoryId]['items'][] = [
                            'item' => $item,
                            'unit_price' => $unitPrices[$index],
                            'quantity' => $quantities[$index],
                            'total_price' => $totalPrices[$index],
                        ];
                    }
                    // dd($previewData);
                    // $groupedData = [];

                    // // Iterate through the form data and group by category
                    // foreach ($formData['work_category_id'] as $key => $category) {
                    //     $groupedData[$category][] = [
                    //         'item' => $formData['items'][$key],
                    //         'quantity' => $formData['quantity'][$key],
                    //         'unit' => $formData['unit'][$key],
                    //         'unit_price' => $formData['unit_price'][$key],
                    //         'total_price' => $formData['total_price'][$key],
                    //         // Add more fields as needed
                    //     ];
                    // }
                    // // dd($groupedData);
                    $company_details = Setting::first();
                    $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
                        ->where('quotations.id', '=', $request->request_id)
                        ->select('clients.*', 'quotations.*')
                        ->first();;
                    // dd($client_info->email);
                    $view = View::make('backend.pages.all_quotations.quotation_preview', compact('groupedData', 'grandTotal', 'subTotal', 'afterDiscount', 'discountAmount', 'tax', 'company_details', 'client_details'))->render();
                    return response()->json(['html' => $view]);
                } catch (Exception $e) {
                    dd($e->getMessage());
                    return response()->json(['type' => 'error', 'message' => "Please Fill With Correct data"]);
                }
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $path = "quotations";
            $rules = [
                'items' => 'required',
                'unit' => 'required',
                'unit_price' => 'required',
                'quantity' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {

                DB::beginTransaction();
                try {

                    $created_time = Carbon::now();
                    $last_quotation = QuotationApplication::first();
                    if (is_null($last_quotation)) {
                        $latest_id = 0;
                        $quotation_code = Helper::uniqueQuoId("QT-", $created_time->year, $latest_id);
                    } else {
                        $latest_id = QuotationApplication::orderBy('id', 'desc')->first()->id;
                        $quotation_code = Helper::uniqueQuoId("QT-", $created_time->year, $latest_id);
                    }
                    $cateogry = $request->input('work_category_id');
                    $items = $request->input('items');
                    $units = $request->input('unit');
                    $quantities = $request->input('quantity');
                    $unitPrices = $request->input('unit_price');
                    $totalPrices = $request->input('total_price');
                    $tax = $request->input('tax');
                    $discountAmount = $request->input('discount_amount');
                    $quo_id = $request->input('request_id');
                    $terms_conditions = $request->input('terms_conditions');
                    $grand_total = $request->input('grand_total');

                    $quotationApplication = new QuotationApplication();
                    $quotationApplication->quotation_request_id = $quo_id;
                    $quotationApplication->quotation_code = $quotation_code;
                    $quotationApplication->terms_conditions = $terms_conditions;
                    $quotationApplication->tax = $tax;
                    $quotationApplication->discount_amount = $discountAmount;
                    $subTotal = 0;
                    for ($i = 0; $i < count($totalPrices); $i++) {
                        $subTotal = $subTotal + $totalPrices[$i];
                    }
                    $quotationApplication->grand_total = $grand_total;
                    $quotationApplication->save();

                    foreach ($items as $key => $value) {
                        $quotation_id = QuotationApplication::orderBy('id', 'desc')->first()->id;
                        $quotationDetails = new QuotationDetails();
                        $quotationDetails->quotation_id = $quotation_id;
                        $quotationDetails->category_id = $cateogry[$key];
                        $quotationDetails->item_id = $value;
                        $quotationDetails->unit = $units[$key];
                        $quotationDetails->quantity = $quantities[$key];
                        $quotationDetails->unit_price = $unitPrices[$key];
                        $quotationDetails->total_price = $totalPrices[$key];
                        $quotationDetails->save();
                    }
                    $quotation_request = Quotation::findOrFail($request->input('request_id'));
                    $quotation_request->is_replied = 1;
                    $quotation_request->save();
                    // email send part

                    $company_details = Setting::first();
                    // $quotation_details = QuotationApplication::where('quotation_request_id', $id)->get();
                    $quotationApplication = QuotationApplication::with('quotationDetails')
                        ->where('quotation_request_id', $quotation_request->id)
                        ->first();
                    $groupedDetails = $quotationApplication->quotationDetails->groupBy('category_id');
                    $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
                        ->where('quotations.id', '=', $quotation_request->id)
                        ->select('clients.*', 'quotations.*')
                        ->first();
                    $pdf = PDF::loadView('backend.pages.all_quotations.quotation_pdf', compact('quotationApplication', 'groupedDetails', 'subTotal', 'company_details', 'client_details'))->setPaper('letter', 'portrait');
                    // dd($quo_id);
                    $client_info = Quotation::findOrFail($quo_id);
                    // dd($client_info->email);

                    $data["email"] = $client_info->email;
                    $data["title"] = "Here is Quotation on your request";
                    $data["body"] = "This is the quotation we made according to your requirement .";

                    Mail::send('backend.pages.all_quotations.quotation_mail', $data, function ($message) use ($data, $pdf) {
                        $message->to($data["email"], $data["email"])
                            ->subject($data["title"])
                            ->attachData($pdf->output(), "Quotation.pdf");
                    });

                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (Exception $e) {
                    DB::rollback();
                    dd($e->getMessage());
                    return response()->json(['type' => 'error', 'message' => "Please Fill With Correct data"]);
                }
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function viewQuotation(Request $request, $id)
    {
        if ($request->ajax()) {
            $company_details = Setting::first();
            // $quotation_details = QuotationApplication::where('quotation_request_id', $id)->get();
            $quotationApplication = QuotationApplication::with('quotationDetails')
                ->where('quotation_request_id', $id)
                ->first();
            // dd($quotationApplication->quotationDetails);
            $subTotal = 0;
            foreach ($quotationApplication->quotationDetails as $detail) {
                $subTotal += (float) $detail->total_price;
            }
            $subTotalFormatted = number_format($subTotal, 2);
            $groupedDetails = $quotationApplication->quotationDetails->groupBy('category_id');
            $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
                ->where('quotations.id', '=', $id)
                ->select('clients.*', 'quotations.*')
                ->first();
            $view = View::make('backend.pages.all_quotations.quotation_view', compact('quotationApplication', 'subTotalFormatted','subTotal', 'groupedDetails', 'company_details', 'client_details'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function generatePDF($id)
    {
        $company_details = Setting::first();
        $quotationApplication = QuotationApplication::with('quotationDetails')
            ->where('quotation_request_id', $id)
            ->first();
        $groupedDetails = $quotationApplication->quotationDetails->groupBy('category_id');
        $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
            ->where('quotations.id', '=', $id)
            ->select('clients.*', 'quotations.*')
            ->first();
        $subTotal = 0;
        for ($i = 0; $i < count($quotationApplication->quotationDetails); $i++)
            $subTotal = $subTotal + $quotationApplication->quotationDetails[$i]['total_price'];
        $pdf = PDF::loadView('backend.pages.all_quotations.quotation_pdf', compact('quotationApplication', 'groupedDetails', 'subTotal', 'company_details', 'client_details'))->setPaper('letter', 'portrait');
        return $pdf->download('QOUTATION.pdf');
    }
    public function deleteQuotation(Request $request, $id)
    {
        if ($request->ajax()) {
            Quotation::where('id', $id)->update(['is_replied' => 0]);
            QuotationApplication::where('quotation_request_id', $id)->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
