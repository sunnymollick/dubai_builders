<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Item;
use App\Models\Backend\Unit;
use App\Models\Backend\WorkCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.item_works.index');
    }

    public function getAllItemWorks(Request $request)
    {
        if ($request->ajax()) {

            $item_works = Item::orderby('created_at', 'desc')->get();

            return DataTables::of($item_works)

                ->addColumn('action', function ($section) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })
                ->addColumn('work_category', function ($itemwork) {
                    return $itemwork->workcategory->title;
                })
                ->addColumn('unit', function ($itemwork) {
                    if ($itemwork->unit == '') {
                        return '';
                    } else return $itemwork->unit->title;
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
        $work_categories = WorkCategory::all();
        $units = Unit::all();
        if ($request->ajax()) {
            $view = View::make('backend.pages.item_works.create', compact(['work_categories', 'units']))->render();
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
                'item_work' => 'required',
                'work_category_id' => 'required',
                'unit_id' => 'required',
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
                    // $client_name = Client::where('id', $request->client_id)->first();
                    $item_work = new Item();
                    $item_work->item_work = $request->input('item_work');
                    $item_work->work_category_id = $request->input('work_category_id');
                    $item_work->unit_id = $request->input('unit_id');
                    $item_work->unit_price = $request->input('unit_price');
                    $item_work->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (Exception $e) {
                    DB::rollback();
                    dd($e->getMessage());
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
    public function show($id, Request $request)
    {
        $item_work = Item::where('id', $id)->first();
        if ($request->ajax()) {
            $view = View::make('backend.pages.item_works.show', compact('item_work'))->render();
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
        $item_work = Item::where('id', $id)->first();
        $work_categories = WorkCategory::all();
        $units = Unit::all();
        if ($request->ajax()) {
            $view = View::make('backend.pages.item_works.edit', compact('item_work', 'work_categories', 'units'))->render();
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
            $rules = [
                'item_work' => 'required',
                'work_category_id' => 'required'
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
                    $item_work = Item::findOrFail($id);
                    $item_work->item_work = $request->input('item_work');
                    $item_work->work_category_id = $request->input('work_category_id');
                    $item_work->unit_id = $request->input('unit_id');
                    $item_work->unit_price = $request->input('unit_price');
                    $item_work->save();
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
            Item::findOrFail($id)->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
