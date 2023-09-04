<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Project;
use App\Models\Client;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image as Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getAllProjects(Request $request)
    {
        if ($request->ajax()) {

            $projects = Project::orderby('created_at', 'desc')->get();

            return Datatables::of($projects)

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

    public function create(Request $request)
    {
        $clients = Client::all();
        if ($request->ajax()) {
            $view = View::make('backend.pages.projects.create', compact('clients'))->render();
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
                'project_title' => 'required',
                'client_id' => 'required',
            ];
            if ($request->hasFile('hero_image')) {
                $hero_image = $request->file('hero_image');
                $image_rename = hexdec(uniqid('', false)) . '.' . $hero_image->getClientOriginalExtension();
                Image::make($hero_image)->resize(270, 354)->save('backend/uploads/images/projects/thumbnail/' . $image_rename);
                $image_url = 'backend/uploads/images/projects/thumbnail/' . $image_rename;
                $thumbnail_img = $image_url;
            }
            if ($request->hasFile('hero_image')) {
                $hero_image = $request->file('hero_image');
                $hero_img = Helper::saveImage($hero_image, 772, 978);
            }
            if ($request->hasFile('image_1')) {
                $image_1 = $request->file('image_1');
                $img_1 = Helper::saveImage($image_1, 370, 260);
            }
            if ($request->hasFile('image_2')) {
                $image_2 = $request->file('image_2');
                $img_2 = Helper::saveImage($image_2, 370, 260);
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
                    $project = new Project();
                    $project->project_title = $request->input('project_title');
                    $project->client_id = $request->input('client_id');
                    $project->project_description = $request->input('project_description');
                    $project->project_features = $request->input('project_features');
                    $project->project_location = $request->input('project_location');
                    $project->project_problem = $request->input('project_problem');
                    $project->handover_time = $request->input('handover_time');
                    $project->project_type = $request->input('project_type');
                    $project->project_status = $request->input('project_status');
                    $project->hero_image = $hero_img;
                    $project->thumbnail_image = $thumbnail_img;
                    $project->image_1 = $img_1;
                    $project->image_2 = $img_2;
                    // $project->is_active = $request->input('is_active');
                    // $project->is_popular = $request->input('is_popular');
                    $project->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (\Exception $e) {
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
}
