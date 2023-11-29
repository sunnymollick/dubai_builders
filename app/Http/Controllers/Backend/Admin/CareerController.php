<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.careers.index');
    }


    public function getAllCareers(Request $request)
    {
        if ($request->ajax()) {

            $careers = Career::orderby('job_title', 'asc')->get();

            return DataTables::of($careers)

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
            $view = View::make('backend.pages.careers.create')->render();
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
        if ($request->ajax()) {
            $path = "careers";

            $rules = [
                'job_title' => 'required',
            ];

            if ($request->hasFile('poster')) {
                $poster = $request->file('poster');
                $poster_img = Helper::saveImage($poster, 215, 220, $path);
            }
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
                    $career = new Career();
                    $career->job_title = $request->input('job_title');
                    $career->slug = $request->input('slug');
                    $career->job_description = $request->input('job_description');
                    $career->educational_requirement = $request->input('ed_requirement');
                    $career->experience_requirement = $request->input('ex_requirement');
                    $career->additional_requirement = $request->input('ad_requirement');
                    $career->no_of_vacancy = $request->input('vacancy');
                    $career->salary = $request->input('salary');
                    $career->job_location = $request->input('location');
                    $career->experience = $request->input('experience');
                    $career->deadline = $request->input('deadline');
                    $career->job_type = $request->input('job_type');
                    $career->compensations = $request->input('compensations');
                    $career->is_active = $request->input('is_active');
                    $career->poster = $poster_img;
                    $career->save(); //
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
    public function show(Career $career, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.careers.show', compact('career'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.careers.edit', compact('career'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        if ($request->ajax()) {
            $path = "careers";

            $rules = [
                'job_title' => 'required',
            ];

            if ($request->hasFile('poster')) {
                if (!empty($request->file('poster'))) {
                    if (File::exists($career->poster)) {
                        $file_old = $career->poster;
                        unlink($file_old);
                    }
                    $poster = $request->file('poster');
                    $poster_img = Helper::saveImage($poster, 215, 220, $path);
                }
            } else {
                $poster_img = $career->poster;
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {

                DB::beginTransaction();
                try {
                    $career->job_title = $request->input('job_title');
                    $career->slug = $request->input('slug');
                    $career->job_description = $request->input('job_description');
                    $career->educational_requirement = $request->input('ed_requirement');
                    $career->experience_requirement = $request->input('ex_requirement');
                    $career->additional_requirement = $request->input('ad_requirement');
                    $career->no_of_vacancy = $request->input('vacancy');
                    $career->salary = $request->input('salary');
                    $career->job_location = $request->input('location');
                    $career->experience = $request->input('experience');
                    $career->deadline = $request->input('deadline');
                    $career->job_type = $request->input('job_type');
                    $career->compensations = $request->input('compensations');
                    $career->is_active = $request->input('is_active');
                    $career->poster = $poster_img;
                    $career->save(); //
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
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career, Request $request)
    {
        if ($request->ajax()) {
            $career->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
