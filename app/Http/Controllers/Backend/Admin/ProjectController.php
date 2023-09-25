<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Project;
use App\Models\Backend\Client;
use Carbon\Carbon;
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
            // $client = $projects->client_id->name;
            return Datatables::of($projects)

                ->addColumn('action', function ($section) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })
                ->addColumn('client_name', function ($project) {
                    return $project->client->name;
                })
                ->addColumn('project_type', function ($project) {
                    if ($project->project_type == 0) {
                        return 'Residential';
                    } elseif ($project->project_type == 1) {
                        return 'Commercial';
                    } elseif ($project->project_type == 2) {
                        return 'Highrise';
                    } else {
                        return 'Business';
                    }
                })
                ->addColumn('project_status', function ($project) {
                    if ($project->project_status == 0) {
                        return 'Running';
                    } elseif ($project->project_status == 1) {
                        return 'Upcoming';
                    } else {
                        return 'Completed';
                    }
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
                'hero_image' => 'required|image|mimes:jpg,png,jpeg',
                'image_1' => 'required|image|mimes:jpg,png,jpeg',
                'image_2' => 'required|image|mimes:jpg,png,jpeg',
            ];
            $path = "projects";
            if ($request->hasFile('hero_image')) {
                $hero_image = $request->file('hero_image');
                $image_rename = hexdec(uniqid('', false)) . '.' . $hero_image->getClientOriginalExtension();
                Image::make($hero_image)->resize(270, 354)->save('backend/uploads/images/projects/thumbnail/' . $image_rename);
                $image_url = 'backend/uploads/images/projects/thumbnail/' . $image_rename;
                $thumbnail_img = $image_url;
            }
            if ($request->hasFile('hero_image')) {
                $hero_image = $request->file('hero_image');
                $hero_img = Helper::saveImage($hero_image, 772, 978, $path);
            }
            if ($request->hasFile('image_1')) {
                $image_1 = $request->file('image_1');
                $img_1 = Helper::saveImage($image_1, 370, 260, $path);
            }
            if ($request->hasFile('image_2')) {
                $image_2 = $request->file('image_2');
                $img_2 = Helper::saveImage($image_2, 370, 260, $path);
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
                    $created_time = Carbon::now();
                    $last_project = Project::first();
                    if (is_null($last_project)) {
                        $latest_id = 0;
                        $project_code = Helper::uniqueNumberConvertor("DB-", $created_time->year, $latest_id);
                    } else {
                        $latest_id = Project::orderBy('id', 'desc')->first()->id;
                        $project_code = Helper::uniqueNumberConvertor("DB-", $created_time->year, $latest_id);
                    }
                    $project->project_title = $request->input('project_title');
                    $project->client_id = $request->input('client_id');
                    $project->project_code = $project_code;
                    $project->project_description = $request->input('project_description');
                    $project->project_location = $request->input('project_location');
                    $project->handover_time = $request->input('handover_time');
                    $project->project_permit = $request->input('project_permit');
                    $project->project_type = $request->input('project_type');
                    $project->project_status = $request->input('project_status');
                    $project->hero_image = $hero_img;
                    $project->thumbnail_image = $thumbnail_img;
                    $project->image_1 = $img_1;
                    $project->image_2 = $img_2;
                    if ($request->input('is_active') != null) {
                        $project->is_active = $request->input('is_active');
                    }
                    if ($request->input('is_popular') != null) {
                        $project->is_popular = $request->input('is_popular');
                    }
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
    public function show(Project $project, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.projects.show', compact('project'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Request $request)
    {
        $clients = Client::all();
        if ($request->ajax()) {
            $view = View::make('backend.pages.projects.edit', compact('project', 'clients'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if ($request->ajax()) {
            $rules = [
                'project_title' => 'required',
                'client_id' => 'required',
                'hero_image' => 'required|image|mimes:jpg,png,jpeg',
                'image_1' => 'required|image|mimes:jpg,png,jpeg',
                'image_2' => 'required|image|mimes:jpg,png,jpeg',
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
                    $project = Project::findOrFail($project->id);
                    $path = "projects";
                    if ($request->hasFile('hero_image')) {
                        if (!empty($request->file('hero_image'))) {
                            if ($project->thumbnail_image) {
                                $file_old = $project->thumbnail_image;
                                unlink($file_old);
                            }
                            $hero_image = $request->file('hero_image');
                            $image_rename = hexdec(uniqid('', false)) . '.' . $hero_image->getClientOriginalExtension();
                            Image::make($hero_image)->resize(270, 354)->save('backend/uploads/images/projects/thumbnail/' . $image_rename);
                            $image_url = 'backend/uploads/images/projects/thumbnail/' . $image_rename;
                            $thumbnail_img = $image_url;
                        }
                    } else {
                        $thumbnail_img = $project->thumbnail_image;
                    }
                    if ($request->hasFile('hero_image')) {
                        if (!empty($request->file('hero_image'))) {
                            if ($project->hero_image) {
                                $file_old = $project->hero_image;
                                unlink($file_old);
                            }
                            $hero_image = $request->file('hero_image');
                            $hero_img = Helper::saveImage($hero_image, 772, 978, $path);
                        }
                    } else {
                        $hero_img = $project->hero_image;
                    }
                    if ($request->hasFile('image_1')) {
                        if (!empty($request->file('image_1'))) {
                            if ($project->image_1) {
                                $file_old = $project->image_1;
                                unlink($file_old);
                            }
                            $image_1 = $request->file('image_1');
                            $img_1 = Helper::saveImage($image_1, 370, 260, $path);
                        }
                    } else {
                        $img_1 = $project->image_1;
                    }
                    if ($request->hasFile('image_2')) {
                        if (!empty($request->file('image_2'))) {
                            if ($project->image_2) {
                                $file_old = $project->image_2;
                                unlink($file_old);
                            }
                            $image_2 = $request->file('image_2');
                            $img_2 = Helper::saveImage($image_2, 370, 260, $path);
                        }
                    } else {
                        $img_2 = $project->image_2;
                    }


                    $project->project_title = $request->input('project_title');
                    $project->client_id = $request->input('client_id');
                    $project->project_description = $request->input('project_description');
                    $project->project_location = $request->input('project_location');
                    $project->handover_time = $request->input('handover_time');
                    $project->project_type = $request->input('project_type');
                    $project->project_status = $request->input('project_status');
                    if ($request->input('is_active') != null) {
                        $project->is_active = $request->input('is_active');
                    }
                    if ($request->input('is_popular') != null) {
                        $project->is_popular = $request->input('is_popular');
                    }
                    $project->hero_image = $hero_img;
                    $project->thumbnail_image = $thumbnail_img;
                    $project->image_1 = $img_1;
                    $project->image_2 = $img_2;
                    $project->save();
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
    public function destroy(Project $project, Request $request)
    {
        if ($request->ajax()) {
            $project->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
