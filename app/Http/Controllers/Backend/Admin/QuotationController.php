<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\QuotationMail;
use App\Models\Backend\Item;
use App\Models\Backend\QuotationApplication;
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
                        $latest_id = Quotation::orderBy('id', 'desc')->first()->id;
                        $quotation_code = Helper::uniqueQuoId("QT-", $created_time->year, $latest_id);
                    }

                    $items = $request->input('items');
                    $units = $request->input('unit');
                    $quantities = $request->input('quantity');
                    $unitPrices = $request->input('unit_price');
                    $totalPrices = $request->input('total_price');
                    $quo_id = $request->input('request_id');

                    foreach ($items as $key => $value) {
                        $quotationApplication = new QuotationApplication();
                        $quotationApplication->quotation_request_id = $quo_id;
                        $quotationApplication->quotation_code = $quotation_code;
                        $quotationApplication->item_id = $value;
                        $quotationApplication->unit = $units[$key];
                        $quotationApplication->quantity = $quantities[$key];
                        $quotationApplication->unit_price = $unitPrices[$key];
                        $quotationApplication->total_price = $totalPrices[$key];
                        $quotationApplication->save();
                    }

                    $quotation_request = Quotation::findOrFail($request->input('request_id'));
                    $quotation_request->is_replied = 1;
                    $quotation_request->save();

                    // email send part
                    $company_details = Setting::first();
                    $quotation_details = QuotationApplication::where('quotation_request_id', $quotation_request->id)->get();
                    $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
                        ->where('quotations.id', '=', $quotation_request->id)
                        ->select('clients.*', 'quotations.*')
                        ->first();
                    $subtotal = 0;
                    for ($i = 0; $i < count($quotation_details); $i++) {
                        $subtotal = $subtotal + $quotation_details[$i]->total_price;
                    }
                    $pdf = PDF::loadView('backend.pages.all_quotations.quotation_pdf', compact('quotation_details', 'subtotal', 'company_details', 'client_details'))->setPaper('letter', 'landscape');
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
            $quotation_details = QuotationApplication::join('items', 'quotation_applications.item_id', '=', 'items.id')
                ->select('items.work_category_id', 'quotation_applications.*')
                ->where('quotation_applications.quotation_request_id', $id)
                ->groupBy('items.work_category_id', 'quotation_applications.id')
                ->get();
            $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
                ->where('quotations.id', '=', $id)
                ->select('clients.*', 'quotations.*')
                ->first();
            $subtotal = 0;
            for ($i = 0; $i < count($quotation_details); $i++) {
                $subtotal = $subtotal + $quotation_details[$i]->total_price;
            }
            $view = View::make('backend.pages.all_quotations.quotation_view', compact('quotation_details', 'subtotal', 'company_details', 'client_details'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function generatePDF($id)
    {
        $company_details = Setting::first();
        $quotation_details = QuotationApplication::where('quotation_request_id', $id)->get();
        $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
            ->where('quotations.id', '=', $id)
            ->select('clients.*', 'quotations.*')
            ->first();
        $subtotal = 0;
        for ($i = 0; $i < count($quotation_details); $i++) {
            $subtotal = $subtotal + $quotation_details[$i]->total_price;
        }
        $pdf = PDF::loadView('backend.pages.all_quotations.quotation_pdf', compact('quotation_details', 'subtotal', 'company_details', 'client_details'))->setPaper('letter', 'portrait');
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
