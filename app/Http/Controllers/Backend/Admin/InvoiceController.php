<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Item;
use App\Models\Backend\QuotationApplication;
use App\Models\Backend\QuotationDetails;
use App\Models\Backend\Unit;
use App\Models\Backend\WorkCategory;
use App\Models\Frontend\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        //
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
    public function destroy(string $id)
    {
        //
    }

    public function generateInvoice($id, Request $request)
    {
        if ($request->ajax()) {
            $all_work_categories = WorkCategory::all();
            $all_units = Unit::all();
            $all_items = Item::all();
            $quote = QuotationApplication::where('id', $id)->first();
            $quotation_details = QuotationDetails::where('quotation_id',$quote->id)->get();
            // dd($quotation_details);
            $view = View::make('backend.pages.invoice.invoice_form', compact('quote','quotation_details','all_items', 'all_work_categories', 'all_units'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
