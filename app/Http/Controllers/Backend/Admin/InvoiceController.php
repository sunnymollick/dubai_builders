<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use App\Models\Backend\Item;
use App\Models\Backend\QuotationApplication;
use App\Models\Backend\QuotationDetails;
use App\Models\Backend\Invoice;
use App\Models\Backend\InvoiceDetails;
use App\Models\Backend\Unit;
use App\Models\Backend\WorkCategory;
use App\Models\Frontend\Quotation;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

use function PHPSTORM_META\type;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $path = "invoice";
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
                    $last_quotation = Invoice::first();
                    if (is_null($last_quotation)) {
                        $latest_id = 0;
                        $invoice_code = Helper::uniqueQuoId("I-", $created_time->year, $latest_id);
                    } else {
                        $latest_id = Invoice::orderBy('id', 'desc')->first()->id;
                        $invoice_code = Helper::uniqueQuoId("I-", $created_time->year, $latest_id);
                    }
                    $title = $request->input('title');
                    $invoice_date = $request->input('invoice_date') == null ? now() : $request->input('invoice_date');
                    $cateogry = $request->input('work_category_id');
                    $items = $request->input('items');
                    $units = $request->input('unit');
                    $quantities = $request->input('quantity');
                    $unitPrices = $request->input('unit_price');
                    $totalPrices = $request->input('total_price');
                    $paidAmount = $request->input('paid_amount');
                    $grand_total = $request->input('grand_total');

                    $quotation_id = $request->input('quotation_id');
                    $invoice = new Invoice();
                    $invoice->quotation_id = $quotation_id;
                    $invoice->title = $title;
                    $invoice->invoice_date = $invoice_date;
                    $invoice->invoice_code = $invoice_code;
                    $invoice->paid_amount = $paidAmount == null ? 0 : $paidAmount;
                    $subTotal = 0;
                    for ($i = 0; $i < count($totalPrices); $i++) {
                        $subTotal = $subTotal + $totalPrices[$i];
                    }
                    $invoice->grand_total = $grand_total;
                    $invoice->save();

                    foreach ($items as $key => $value) {
                        $invoice_id = Invoice::orderBy('id', 'desc')->first()->id;
                        $invoiceDetails = new InvoiceDetails();
                        $invoiceDetails->invoice_id = $invoice_id;
                        $invoiceDetails->category_id = $cateogry[$key];
                        $invoiceDetails->item_id = $value;
                        $invoiceDetails->unit = $units[$key];
                        $invoiceDetails->quantity = $quantities[$key];
                        $invoiceDetails->unit_price = $unitPrices[$key];
                        $invoiceDetails->total_price = $totalPrices[$key];
                        $invoiceDetails->save();
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice, Request $request)
    {
        //

        if ($request->ajax()) {
            $inv_id = $invoice->id;
            // dd($inv_id);
            InvoiceDetails::where('invoice_id', $inv_id)->delete();
            $invoice->delete();

            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    public function generateInvoice($id, Request $request)
    {
        if ($request->ajax()) {
            $all_work_categories = WorkCategory::all();
            $all_units = Unit::all();
            $all_items = Item::all();
            $quote = QuotationApplication::where('id', $id)->first();
            $quotation_details = QuotationDetails::where('quotation_id', $quote->id)->get();
            try {
                $invoice =  DB::table('invoice_details')
                    ->select('invoice_details.item_id', DB::raw('SUM(invoice_details.quantity) AS tq'))
                    ->leftJoin('invoices', 'invoice_details.invoice_id', '=', 'invoices.id')
                    ->where('invoices.quotation_id', $id)
                    ->groupBy('invoice_details.item_id')
                    ->get();

                function getInvoiceD($invoices, $item)
                {
                    foreach ($invoices as $iv) {
                        if ($iv->item_id == $item) {
                            return $iv->tq;
                        }
                    }
                }
                if (!empty($invoice)) {
                    foreach ($quotation_details as $key => $value) {
                        $item_id  = $value['item_id'];
                        $item_quantity = getInvoiceD($invoice, $item_id);
                        $value['quantity'] = $value['quantity'] - $item_quantity;

                        if ($value['quantity'] <= 0) {
                            unset($quotation_details[$key]);
                        } else {
                            $value['total_price'] = $value['unit_price'] * $value['quantity'];
                        }
                    }
                }
                // dd($invoice);
            } catch (Exception $exception) {
            }

            // dd($quotation_details);
            $view = View::make('backend.pages.invoice.invoice_form', compact('quote', 'quotation_details', 'all_items', 'all_work_categories', 'all_units'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function show_project_invoices($id)
    {
        return view('backend.pages.invoice.project_invoices', compact('id'));
    }
    public function get_project_invoices($id, Request $request)
    {
        if ($request->ajax()) {

            $invoice = Invoice::where('quotation_id', $id)->orderby('created_at', 'desc')->get();
            // $client = $projects->client_id->name;
            return Datatables::of($invoice)

                ->addColumn('action', function ($section) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    return $html;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
