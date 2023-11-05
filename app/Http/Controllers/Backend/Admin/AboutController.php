<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.about.index');
    }

    public function getAboutInfo(Request $request){
        if ($request->ajax()) {

            $about = About::orderby('created_at', 'desc')->get();

            return Datatables::of($about)

                ->addColumn('action', function ($about) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $about->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $about->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })

                ->addColumn('title', function ($about) {
                    return Str::of($about->title)->limit(50);;
                })
                ->addColumn('slug', function ($about) {
                    return Str::of($about->slug)->limit(50);;
                })
                ->addColumn('hero_image', function ($about) {
                    return "<img src='" . asset($about->hero_image) . "' class='img-thumbnail' width='100px'>";
                })
                ->rawColumns(['action','hero_image'])
                ->addIndexColumn()
                ->make(true);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
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
    public function show(About $about,Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.about.show', compact('about'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about,Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.about.edit', compact('about'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        if ($request->ajax()) {

            $about = About::findOrFail($about->id);
            $hero_image = $about->hero_image;
            $about_image = $about->about_image;

            $rules = [
                'title' => 'required',
                'description' => 'required',
                'hero_image' => 'image|mimes:jpeg,png,jpg',
                'about_image' => 'image|mimes:jpeg,png,jpg',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['type' => 'error', 'errors' => $validator->getMessageBag()->toArray()]);
            } else {

                if ($request->hasFile('hero_image')) {
                    $hero_image = $request->file('hero_image');
                    $about->hero_image =  Helper::saveImage($hero_image, 1170 , 663, 'about');
                    if (!empty($hero_image)) {
                        unlink($hero_image);
                    }
                }

                if ($request->hasFile('about_image')) {
                    $about_image = $request->file('about_image');
                    $about->about_image =  Helper::saveImage($about_image, 512  , 652 , 'about');
                    if (!empty($about_image)) {
                        unlink($about_image);
                    }
                }

                $about->title = $request->input('title');
                $about->slug = $request->input('slug');
                $about->description = $request->input('description');
                $about->short_description = $request->input('short_description');
                $about->our_mission = $request->input('our_mission');
                $about->our_vision = $request->input('our_vision');
                $about->our_builders = $request->input('our_builders');
                $about->experience_year = $request->input('experience_year');
                $about->created_at = Carbon::now();
                $about->updated_at = Carbon::now();
                $about->save();

                return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
