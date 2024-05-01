<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\QuotationMail;
use App\Models\Backend\Client;
use App\Models\Backend\Item;
use App\Models\Backend\Project;
use App\Models\Backend\QuotationApplication;
use App\Models\Backend\QuotationDetails;
use App\Models\Backend\Unit;
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
        $quotation_requests = Quotation::orderBy('is_confirmed', 'asc')->orderBy('id', 'desc')
            ->join('quotation_applications', 'quotations.id', '=', 'quotation_applications.quotation_request_id')
            ->select('quotations.*', 'quotation_applications.quotation_code')
            ->where('quotations.is_replied', 1)
            ->get();
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
    public function create(Request $request)
    {
        $clients = Client::all();
        $work_categories = WorkCategory::all();
        $units = Unit::all();
        if ($request->ajax()) {

            $view = View::make('backend.pages.all_quotations.create', compact('clients', 'work_categories', 'units'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
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
                    // dd($request);
                    $itemIds = $request->input('items');
                    $categoryIds = $request->input('work_category_id');
                    $units = $request->input('unit');
                    $unitPrices = $request->input('unit_price');
                    $quantities = $request->input('quantity');
                    $totalPrices = $request->input('total_price');
                    $discountAmount = $request->input('discount_amount');
                    $tax = $request->input('tax');
                    $grandTotal = $request->input('grand_total');

                    $subTotal = 0;
                    for ($i = 0; $i < count($totalPrices); $i++) {
                        $subTotal += (float) $totalPrices[$i];
                    }
                    $afterDiscount = $subTotal - $discountAmount;
                    
                    $afterDiscount = number_format($afterDiscount,2,",",".");

                    $discountAmount = number_format($discountAmount,2,",",".");
                    
                    $subTotal = number_format($subTotal,2,",",".");
                    // Fetch items from the database based on item_ids
                    $items = Item::whereIn('id', $itemIds)->get();
                    $categories = WorkCategory::whereIn('id', $categoryIds)->get();
                    // dd($ite);

                    // Group items by category
                    $groupedData = [];
                    // foreach ($categories as $category) {
                    //     foreach ($items as $item) {
                    //         if ($category->id == $item->work_category_id) {
                    //             $groupedData[$category->id] = [
                    //                 'category' => $category,
                    //                 'items' => $item,
                    //             ];
                    //         }
                    //     }
                    // };
                    $groupedData = array_map(function ($category_id, $item, $unit, $unitPrice, $quantity, $totalPrice) {
                        return [
                            "category_id" => $category_id,
                            "item_id" => $item,
                            "unit" => $unit,
                            "unitPrice" => $unitPrice,
                            "quantity" => $quantity,
                            "totalPrice" => $totalPrice,
                        ];
                    }, array_values($categoryIds), array_values($itemIds), array_values($units), array_values($unitPrices), array_values($quantities), array_values($totalPrices));

                    $newGroup = [];
                    foreach ($groupedData as $gd) {
                        foreach ($items as $itm) {
                            if ($gd['item_id'] == $itm->id) {
                                $gd['item_name'] = $itm->item_work;
                                // dd($gd);
                                array_push($newGroup, $gd);
                            }
                        }
                    }

                    // foreach($)

                    $newArray = [];

                    foreach ($newGroup as $item) {
                        $categoryId = $item['category_id'];
                        if (!isset($newArray[$categoryId])) {
                            $newArray[$categoryId] = [];
                        }
                        $newArray[$categoryId][] = $item;
                    }

                    $dataArray = [];
                    foreach ($newArray as $key => $value) {
                        foreach ($categories as $ct) {
                            if ($key == $ct->id) {
                                $dataArray[$ct->title] = $value;
                            }
                        }
                    }

                    // dd($dataArray);



                    // for ($i = 0; $i < count($itemIds); $i++) {
                    //     $groupedData[$items[$i]->work_category_id] = [
                    //         'category' => WorkCategory::where('id', $items[$i]->work_category_id)->first(),
                    //         'items' => $itemIds[$i]
                    //     ];
                    // }
                    // // foreach ($groupedData as $i => $cat)
                    // foreach ($items as $index => $item) {
                    //     $categoryId = $categoryIds[$index];

                    //     $groupedData[$categoryId]['items'][] = [
                    //         'item' => $item,
                    //         'unit' => $units[$index],
                    //         'unit_price' => $unitPrices[$index],
                    //         'quantity' => $quantities[$index],
                    //         'total_price' => $totalPrices[$index],
                    //     ];
                    // }

                    $company_details = Setting::first();
                    if ($request->request_id) {
                        $client_details = Quotation::join('clients', 'quotations.email', '=', 'clients.email')
                            ->where('quotations.id', '=', $request->request_id)
                            ->select('clients.*', 'quotations.*')
                            ->first();
                    }
                    if ($request->client_id) {
                        $client_details = Client::where('id', $request->client_id)
                            ->first();
                    }
                    $view = View::make('backend.pages.all_quotations.quotation_preview', compact('dataArray', 'grandTotal', 'subTotal', 'afterDiscount', 'discountAmount', 'tax', 'company_details', 'client_details'))->render();
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
                    $terms_conditions = $request->input('terms_conditions');
                    $grand_total = $request->input('grand_total');

                    if ($request->request_id) {
                        $quo_id = $request->input('request_id');
                        $quotation_client = Quotation::find($quo_id);
                        $quotationApplication = new QuotationApplication();
                        $quotationApplication->quotation_request_id = $quo_id;
                        $quotationApplication->client_id = $quotation_client->client_id;
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
                        $quotation_client->is_replied = 1;
                        $quotation_client->save();
                        // email send part

                        $company_details = Setting::first();
                        // $quotation_details = QuotationApplication::where('quotation_request_id', $id)->get();
                        $quotationApplication = QuotationApplication::with('quotationDetails')
                            ->where('quotation_request_id', $quotation_client->id)
                            ->first();
                        $groupedDetails = $quotationApplication->quotationDetails->groupBy('category_id');
                        $client_details = Client::where('id', $quotation_client->client_id)
                            ->first();
                        $pdf = PDF::loadView('backend.pages.all_quotations.quotation_pdf', compact('quotationApplication', 'groupedDetails', 'subTotal', 'company_details', 'client_details'))->setPaper('letter', 'portrait');
                        // dd($quo_id);
                        // dd($client_info->email);

                        $data["email"] = $quotation_client->email;
                        $data["title"] = "Here is Quotation on your request";
                        $data["body"] = "This is the quotation we made according to your requirement .";

                        Mail::send('backend.pages.all_quotations.quotation_mail', $data, function ($message) use ($data, $pdf) {
                            $message->to($data["email"], $data["email"])
                                ->subject($data["title"])
                                ->attachData($pdf->output(), "Quotation.pdf");
                        });
                    }

                    if ($request->client_id) {
                        $quotation = new Quotation();
                        $client_details = Client::where('id', $request->client_id)
                            ->first();
                        $quotation->client_id = $request->client_id;
                        $quotation->name = $client_details->name;
                        $quotation->company_name = $client_details->organization_name;
                        $quotation->location = $client_details->address;
                        $quotation->email = $client_details->email;
                        $quotation->mobile = $client_details->phone;
                        $quotation->is_read = 1;
                        $quotation->is_replied = 1;
                        $quotation->is_confirmed = 0;
                        $quotation->message = $request->input('message');
                        $quotation->save();


                        $quotationApplication = new QuotationApplication();
                        $quotationApplication->quotation_request_id = $quotation->id;
                        $quotationApplication->client_id = $request->client_id;
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
                        // email send part

                        $company_details = Setting::first();
                        // $quotation_details = QuotationApplication::where('quotation_request_id', $id)->get();
                        $quotationApplication = QuotationApplication::with('quotationDetails')
                            ->orderBy('id', 'desc')->first();
                        $groupedDetails = $quotationApplication->quotationDetails->groupBy('category_id');
                        $pdf = PDF::loadView('backend.pages.all_quotations.quotation_pdf', compact('quotationApplication', 'groupedDetails', 'subTotal', 'company_details', 'client_details'))->setPaper('letter', 'portrait');
                        // dd($quo_id);
                        // dd($client_info->email);

                        $data["email"] = $client_details->email;
                        $data["title"] = "Here is Quotation on your request";
                        $data["body"] = "This is the quotation we made according to your requirement .";

                        Mail::send('backend.pages.all_quotations.quotation_mail', $data, function ($message) use ($data, $pdf) {
                            $message->to($data["email"], $data["email"])
                                ->subject($data["title"])
                                ->attachData($pdf->output(), "Quotation.pdf");
                        });
                    }

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
            // dd($client_details);
            $view = View::make('backend.pages.all_quotations.quotation_view', compact('quotationApplication', 'subTotalFormatted', 'subTotal', 'groupedDetails', 'company_details', 'client_details'))->render();
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
    public function saveQuotation(Request $request, $id)
    {
        if ($request->ajax()) {
            Quotation::where('id', $id)->update(['is_confirmed' => 1]);
            $quotation_id = QuotationApplication::where('quotation_request_id', $id)->first();
            $quotation_request_details = Quotation::where('id', $id)->first();


            // $client_name = Client::where('id', $request->client_id)->first();
            $project = new Project();
            $created_time = Carbon::now();
            $last_project = Project::first();
            if (is_null($last_project)) {
                $latest_id = 0;
                $project_code = Helper::uniqueNumberConvertor("DB-", $created_time->year, $latest_id);
            } else {
                $latest_id = Project::orderBy('id', 'desc')->first()->id;
                $project_code = Helper::uniqueNumberConvertor("DB-", $created_time->year, $latest_id);
            }
            $project->client_id = $quotation_request_details->client_id;
            $project->quotation_id = $quotation_id->id;
            $project->project_code = $project_code;
            $project->project_location = $quotation_request_details->location;
            $project->handover_time = $quotation_request_details->project_time;
            $project->project_type = $quotation_request_details->project_type;
            $project->save(); //



            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
