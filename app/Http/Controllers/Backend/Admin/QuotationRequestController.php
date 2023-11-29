<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Unit;
use App\Models\Backend\WorkCategory;
use App\Models\Frontend\Quotation;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class QuotationRequestController extends Controller
{
    public function index()
    {
        $quotation_requests = Quotation::orderby('id', 'desc')->get();
        return view('backend.pages.quotation.all_request', ['quotation_requests' => $quotation_requests]);
    }
    public function edit($id, Request $request)
    {
        $work_categories = WorkCategory::all();
        $units = Unit::all();
        $quote = Quotation::where('id', $id)->first();
        if ($request->ajax()) {

            $view = View::make('backend.pages.quotation.reply', compact('quote','work_categories', 'units'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
    public function viewQuotationRequest(Request $request, $id){
        if ($request->ajax()) {
            $quotation_request = Quotation::findOrFail($id);
            $quotation_request->is_read = 1;
            $quotation_request->save();
            $view = View::make('backend.pages.quotation.view_quotation_request', compact('quotation_request'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    public function deleteQuotationRequest(Request $request,$id){
        if ($request->ajax()) {
            $quotation = Quotation::findOrFail($id);
            $quotation->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
