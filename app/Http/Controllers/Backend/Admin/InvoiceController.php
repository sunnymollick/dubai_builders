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
use App\Models\InvoicePayment;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Mail;

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
                    $paidAmount = $request->input('paid_amount') == null ? 0 : $request->input('paid_amount');
                    $grand_total = $request->input('grand_total');

                    $quotation_id = $request->input('quotation_id');
                    $invoice = new Invoice();
                    $invoice->quotation_id = $quotation_id;
                    $invoice->title = $title;
                    $invoice->invoice_date = $invoice_date;
                    $invoice->invoice_code = $invoice_code;
                    $invoice->paid_amount = $paidAmount;

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

                    

                    // invoice payment insertion
                    if ($paidAmount != 0) {
                        $invoice_payment = new InvoicePayment();
                        $invoice_payment->invoice_id = $invoice_id;
                        $invoice_payment->payment_date = $invoice_date;
                        $invoice_payment->paid_amount = $paidAmount;
                        $invoice_payment->payment_method = $request->payment_method;
                        $invoice_payment->cheque_date = $request->cheque_date;
                        $invoice_payment->cheque_number = $request->cheque_number;
                        $invoice_payment->bank_name = $request->bank_name;
                        $invoice_payment->save();
                    }




                    $company_details = Setting::first();
                    $inv_data = Invoice::with('invoiceDetails')
                        ->where('quotation_id', $quotation_id)
                        ->first();

                    $groupedDetails = $inv_data->invoiceDetails->groupBy('category_id');
                    $client_id = QuotationApplication::where('quotation_id', $quotation_id)->value('client_id');
                    $client_details = Client::where('id', $client_id)->first();

                    $pdf = Pdf::loadView('backend.pages.invoice.invoice_pdf', compact('inv_data', 'groupedDetails', 'subTotal', 'company_details', 'client_details'))->setPaper('letter', 'portrait');


                    $data["email"] = $client_details->email;
                    $data["title"] = "Here is Invoice for your " . $title . " work";
                    $data["body"] = "This is the Invoice we made for following work list pdf attached in this mail.";

                    Mail::send('backend.pages.invoice.invoice_mail', $data, function ($message) use ($data, $pdf) {
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
    public function invoiceSummery($id, Request $request)
    {
        if ($request->ajax()) {
            try {

                $invoice = Invoice::join('invoice_details', 'invoices.id', 'invoice_details.invoice_id')
                    ->where('invoices.quotation_id', $id)
                    ->get();
                dd($invoice);


                // dd($invoice);
            } catch (\Exception $e) {
                dd($e->getMessage());
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

                ->addColumn('action', function ($invoice) {
                    $html = '<div class="btn-group">';
                    if ($invoice->paid_amount <= $invoice->grand_total) {
                        $html .= '<a data-toggle="tooltip"  id="' . $invoice->id . '" class="btn btn-primary mr-1 add_payment" title="Add Payment"><i class="lni lni-plus"></i> </a>';
                    }
                    $html .= '<a data-toggle="tooltip"  id="' . $invoice->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $invoice->id . '" class="btn btn-secondary mr-1 show_payments" title="Show Payments"><i class="bx bx-file"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $invoice->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    return $html;
                })
                ->addColumn('grand_total', function ($invoice) {
                    return number_format((float) $invoice->grand_total);
                })
                ->addColumn('paid_amount', function ($invoice) {
                    return number_format((float) $invoice->paid_amount);
                })
                ->addColumn('due', function ($invoice) {
                    return number_format((float) ($invoice->grand_total - $invoice->paid_amount));
                })
                ->rawColumns(['action', 'paid_amount', 'due', 'grand_total'])
                ->addIndexColumn()
                ->make(true);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    public function viewInvoice(Request $request, $id)
    {
        if ($request->ajax()) {
            $company_details = Setting::first();
            // $quotation_details = QuotationApplication::where('quotation_request_id', $id)->get();
            $invoice = Invoice::with('invoiceDetails')
                ->where('id', $id)
                ->first();

            $subTotal = 0;
            foreach ($invoice->invoiceDetails as $detail) {
                $subTotal += (float) $detail->total_price;
            }
            $subTotalFormatted = number_format($subTotal, 2);
            $groupedDetails = $invoice->invoiceDetails->groupBy('category_id');
            $client_id = QuotationApplication::where('id', $invoice->quotation_id)->value('client_id');
            // dd($client_id);
            $client_details = Client::where('id', $client_id)->first();
            // dd($client_details);
            $view = View::make('backend.pages.invoice.invoice_view', compact('invoice', 'subTotalFormatted', 'subTotal', 'groupedDetails', 'company_details', 'client_details'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    public function createPayments($id, Request $request)
    {
        $invoice = Invoice::findOrFail($id);
        if ($request->ajax()) {
            $view = View::make('backend.pages.invoice.create_invoice_payment', compact('invoice'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    public function storeInvoicePayment(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'payment_date' => 'required',
                'amount' => 'required',
                'payment_method' => 'required',
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

                    $invoice_payment = new InvoicePayment();
                    $invoice_payment->invoice_id = $request->invoice_id;
                    $invoice_payment->payment_date = $request->payment_date;
                    $invoice_payment->paid_amount = $request->amount;
                    $invoice_payment->payment_method = $request->payment_method;
                    $invoice_payment->cheque_date = $request->cheque_date;
                    $invoice_payment->cheque_number = $request->cheque_number;
                    $invoice_payment->bank_name = $request->bank_name;
                    $invoice_payment->save();

                    $invoice = Invoice::findOrFail($request->invoice_id);
                    $invoice->paid_amount += $request->amount;
                    $invoice->save();

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

    public function showPayments($id, Request $request)
    {
        $invoice_payments = InvoicePayment::where('invoice_id', $id)->get();
        if ($request->ajax()) {
            $view = View::make('backend.pages.invoice.show_invoice_payments', compact('invoice_payments'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
