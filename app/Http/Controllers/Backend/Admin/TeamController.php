<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Team;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image as Image;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.team.index');
    }

    public function getWholeTeam(Request $request)
    {
        if ($request->ajax()) {

            $team = Team::orderby('created_at', 'desc')->get();
            // $client = $projects->client_id->name;
            return Datatables::of($team)

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
            $view = View::make('backend.pages.team.create')->render();
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

            $rules = [
                'name' => 'required',
                'designation' => 'required',
                'email' => 'required',
                'order' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ];
            $path = "team";
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $img = Helper::saveImage($image, 370, 440, $path);
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
                    $team = new Team();
                    $team->name = $request->input('name');
                    $team->designation = $request->input('designation');
                    $team->email = $request->input('email');
                    $team->phone = $request->input('phone');
                    $team->fb_link = $request->input('fb_link');
                    $team->x_link = $request->input('x_link');
                    $team->linkedin_link = $request->input('linkedin_link');
                    $team->description = $request->input('description');
                    $team->order = $request->input('order');
                    $team->image = $img;
                    $team->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (\Exception $e) {
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
    public function show(Team $team, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.team.show', compact('team'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.team.edit', compact('team'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Team $team, Request $request)
    {

        if ($request->ajax()) {
            $rules = [

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
                    $team = Team::findOrFail($team->id);
                    $path = "team";
                    if ($request->hasFile('image')) {
                        if (!empty($request->file('image'))) {
                            if ($team->image) {
                                $file_old = $team->image;
                                unlink($file_old);
                            }
                            $image = $request->file('image');
                            $img = Helper::saveImage($image, 370, 440, $path);
                        }
                    } else {
                        $img = $team->image;
                    }
                    $team->name = $request->input('name');
                    $team->designation = $request->input('designation');
                    $team->email = $request->input('email');
                    $team->phone = $request->input('phone');
                    $team->fb_link = $request->input('fb_link');
                    $team->x_link = $request->input('x_link');
                    $team->linkedin_link = $request->input('linkedin_link');
                    $team->description = $request->input('description');
                    $team->order = $request->input('order');
                    $team->image = $img;
                    $team->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (\Exception $e) {
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
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team, Request $request)
    {
        if ($request->ajax()) {
            $team->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
