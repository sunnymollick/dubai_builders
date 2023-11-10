<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.slider.index');
    }

    public function getAllSliders(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::orderby('is_active', 'desc')->get();

            return DataTables::of($sliders)

                ->addColumn('action', function ($sliders) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $sliders->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $sliders->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $sliders->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })
                ->addColumn('blog_description', function ($sliders) {
                    return Str::of($sliders->blog_description)->limit(30);;
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
            $view = View::make('backend.pages.slider.create')->render();
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
                'title' => 'required',
                'description' => 'required',
                'video' => 'required|mimes:mp4,webm',
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
                    $slider = new Slider();

                    if ($request->hasFile('video')) {
                        $video = $request->file('video');
                        $video_name  = $video->getClientOriginalName();
                        $video->move('backend/uploads/videos/slider', $video_name);
                    }

                    $slider->title = $request->input('title');
                    $slider->description = $request->input('description');
                    $slider->video = 'backend/uploads/videos/slider/' . $video_name;
                    $slider->is_active = $request->input('is_active');

                    $slider->save(); //
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
