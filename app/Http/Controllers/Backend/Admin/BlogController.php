<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.blog.index');
    }

    public function getAllBlogs(Request $request)
    {
        if ($request->ajax()) {
            $blogs = Blog::orderby('created_at', 'desc')->get();

            return DataTables::of($blogs)

                ->addColumn('action', function ($blog) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $blog->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $blog->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $blog->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })

                ->addColumn('blog_title', function ($blog) {
                    return Str::of($blog->blog_title)->limit(30);;
                })
                ->addColumn('blog_description', function ($blog) {
                    return Str::of($blog->blog_description)->limit(30);;
                })
                ->addColumn('author_image', function ($blog) {
                    return "<img src='" . asset($blog->author_image) . "' class='img-thumbnail' width='100px'>";
                })
                ->rawColumns(['action', 'author_image'])
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
            $view = View::make('backend.pages.blog.create')->render();
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
                'blog_title' => 'required',
                'blog_description' => 'required',
                'author' => 'required',
                'author_description' => 'required',
                'author_image' => 'required',
                'hero_image' => 'required',
                'thumbnail_image' => 'required',
                'image_1' => 'required',
                'image_2' => 'required',
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
                    $blog = new Blog();

                    if ($request->hasFile('hero_image')) {
                        $hero_image = $request->file('hero_image');
                        $blog->hero_image =  Helper::saveImage($hero_image, 1170, 617, 'blogs');
                        // if (!empty($blog->hero_image)) {
                        //     unlink($blog->hero_image);
                        // }
                    }
                    if ($request->hasFile('thumbnail_image')) {
                        $thumbnail_image = $request->file('thumbnail_image');
                        $blog->thumbnail_image =  Helper::saveImage($thumbnail_image, 370, 270, 'blogs');
                        // if (!empty($blog->thumbnail_image)) {
                        //     unlink($blog->thumbnail_image);
                        // }
                    }
                    if ($request->hasFile('author_image')) {
                        $author_image = $request->file('author_image');
                        $blog->author_image =  Helper::saveImage($author_image, 370, 257, 'blogs');
                        // if (!empty($blog->author_image)) {
                        //     unlink($blog->author_image);
                        // }
                    }
                    if ($request->hasFile('image_1')) {
                        $image_1 = $request->file('image_1');
                        $blog->image_1 =  Helper::saveImage($image_1, 370, 260, 'blogs');
                        // if (!empty($blog->image_1)) {
                        //     unlink($blog->image_1);
                        // }
                    }
                    if ($request->hasFile('image_2')) {
                        $image_2 = $request->file('image_2');
                        $blog->image_2 =  Helper::saveImage($image_2, 370, 260, 'blogs');
                        // if (!empty($blog->image_2)) {
                        //     unlink($blog->image_2);
                        // }
                    }

                    $blog->blog_title = $request->input('blog_title');
                    $blog->blog_description = $request->input('blog_description');
                    $blog->youtube_video_link = $request->input('youtube_video_link');
                    $blog->author = $request->input('author');
                    $blog->author_slug = $request->input('author_slug');
                    $blog->author_description = $request->input('author_description');
                    $blog->author_fb = $request->input('author_fb');
                    $blog->author_twitter = $request->input('author_twitter');
                    $blog->author_instagram = $request->input('author_instagram');
                    $blog->author_pinterest = $request->input('author_pinterest');
                    $blog->author_linkedin = $request->input('author_linkedin');
                    if ($request->input('is_publish') == 1 ) {
                        $blog->is_publish = 1;
                    }else{
                        $blog->is_publish = 0;
                    }
                    $blog->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (\Exception $e) {
                    dd($e->getMessage());
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
    public function show(Request $request, Blog $blog)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.blog.show', compact('blog'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Blog $blog)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.blog.edit', compact('blog'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if ($request->ajax()) {

            $rules = [
                'blog_title' => 'required',
                'blog_description' => 'required',
                'author' => 'required',
                'author_description' => 'required',
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
                    $hero_image = $blog->hero_image;
                    $thumbnail_image = $blog->thumbnail_image;
                    $author_image = $blog->author_image;
                    $image_1 = $blog->image_1;
                    $image_2 = $blog->image_2;

                    if ($request->hasFile('hero_image')) {
                        $hero_image = $request->file('hero_image');
                        $blog->hero_image =  Helper::saveImage($hero_image, 1170, 617, 'blogs');
                        if (!empty($hero_image)) {
                            unlink($hero_image);
                        }
                    }
                    if ($request->hasFile('thumbnail_image')) {
                        $thumbnail_image = $request->file('thumbnail_image');
                        $blog->thumbnail_image =  Helper::saveImage($thumbnail_image, 370, 270, 'blogs');
                        if (!empty($thumbnail_image)) {
                            unlink($thumbnail_image);
                        }
                    }
                    if ($request->hasFile('author_image')) {
                        $author_image = $request->file('author_image');
                        $blog->author_image =  Helper::saveImage($author_image, 370, 257, 'blogs');
                        if (!empty($author_image)) {
                            unlink($author_image);
                        }
                    }
                    if ($request->hasFile('image_1')) {
                        $image_1 = $request->file('image_1');
                        $blog->image_1 =  Helper::saveImage($image_1, 370, 260, 'blogs');
                        if (!empty($image_1)) {
                            unlink($image_1);
                        }
                    }
                    if ($request->hasFile('image_2')) {
                        $image_2 = $request->file('image_2');
                        $blog->image_2 =  Helper::saveImage($image_2, 370, 260, 'blogs');
                        if (!empty($image_2)) {
                            unlink($image_2);
                        }
                    }

                    $blog->blog_title = $request->input('blog_title');
                    $blog->blog_description = $request->input('blog_description');
                    $blog->youtube_video_link = $request->input('youtube_video_link');
                    $blog->author = $request->input('author');
                    $blog->author_slug = $request->input('author_slug');
                    $blog->author_description = $request->input('author_description');
                    $blog->author_fb = $request->input('author_fb');
                    $blog->author_twitter = $request->input('author_twitter');
                    $blog->author_instagram = $request->input('author_instagram');
                    $blog->author_pinterest = $request->input('author_pinterest');
                    $blog->author_linkedin = $request->input('author_linkedin');
                    // $blog->is_publish = $request->input('is_publish');
                    if ($request->input('is_publish') == 1 ) {
                        $blog->is_publish = 1;
                    }else{
                        $blog->is_publish = 0;
                    }

                    $blog->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
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
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Blog $blog)
    {
        if ($request->ajax()) {
            $blog->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
