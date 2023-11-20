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
    // public function getAllQuotationRequest(Request $request){
    //     if ($request->ajax()) {
    //         $quotation_requests = Quotation::orderby('id','desc')->get();

    //         return DataTables::of($quotation_requests)

    //             ->addColumn('action', function ($quotation_requests) {
    //                 $html = '<div class="btn-group">';
    //                 $html .= '<a data-toggle="tooltip"  id="' . $quotation_requests->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
    //                 $html .= '<a data-toggle="tooltip"  id="' . $quotation_requests->id . '" class="btn btn-info mr-1 edit" title="Reply"><i class="lni lni-reply"></i> </a>';
    //                 $html .= '<a data-toggle="tooltip"  id="' . $quotation_requests->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
    //                 $html .= '</div>';
    //                 return $html;
    //             })
    //             ->addColumn('message', function ($quotation_requests) {
    //                 return Str::of($quotation_requests->message)->limit(30);
    //             })
    //             ->rawColumns(['action','message'])
    //             ->addIndexColumn()
    //             ->make(true);
    //     } else {
    //         return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
    //     }
    // }
}
