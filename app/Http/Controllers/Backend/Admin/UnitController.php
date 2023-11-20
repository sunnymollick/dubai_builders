<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Item;
use App\Models\Backend\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.work_categories.index');
    }

    public function getUnits(Request $request)
    {
        if ($request->ajax()) {

            $units = Unit::orderby('created_at', 'desc')->get();

            return DataTables::of($units)

                ->addColumn('action', function ($section) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.units.create')->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        if ($request->ajax()) {

            $rules = [
                'title' => 'required',
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

                    $unit = new Unit();
                    $unit->title = $request->input('title');
                    $unit->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['type' => 'error', 'message' => "Please Fill With Correct data"]);
                }
                // }
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $unit = Unit::where('id', $id)->first();
        if ($request->ajax()) {
            $view = View::make('backend.pages.units.show', compact('unit'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        $unit = Unit::where('id', $id)->first();
        if ($request->ajax()) {
            $view = View::make('backend.pages.units.edit', compact('unit'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $rules = [];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {

                DB::beginTransaction();
                try {
                    $unit = Unit::findOrFail($id);
                    $unit->title = $request->input('title');
                    $unit->save();
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['type' => 'error', 'message' => "Please Fill With Correct data"]);
                }
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            Item::where('unit_id', $id)->update(['unit_id' => '']);

            Unit::findOrFail($id)->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
