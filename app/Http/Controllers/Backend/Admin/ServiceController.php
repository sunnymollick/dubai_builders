<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image as Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.services.index');
    }

    public function getAllServices(Request $request)
    {
        if ($request->ajax()) {

            $services = Service::orderby('service_title', 'asc')->get();

            return DataTables::of($services)

                ->addColumn('action', function ($section) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $section->id . '" class="btn btn-danger delete" title="Delete"><i class="lni lni-trash"></i> </a>';
                    $html .= '</div>';
                    return $html;
                })->addColumn('service_details', function ($section) {
                    return Str::of($section->service_details)->limit(50);
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
            $view = View::make('backend.pages.services.create')->render();
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
            $path = "services";

            $rules = [
                'service_title' => 'required',
            ];
            if ($request->hasFile('logo')) {
                $thumb_path = $path . "/thumbnail";
                $thumb_image = $request->file('thumb_image');
                $thumb_img = Helper::saveImage($thumb_image, 370, 340, $thumb_path);
            }
            if ($request->hasFile('hero_image')) {
                $hero_image = $request->file('hero_image');
                $hero_img = Helper::saveImage($hero_image, 772, 480, $path);
            }
            if ($request->hasFile('image_1')) {
                $image_1 = $request->file('image_1');
                $img_1 = Helper::saveImage($image_1, 370, 260, $path);
            }
            if ($request->hasFile('image_2')) {
                $image_2 = $request->file('image_2');
                $img_2 = Helper::saveImage($image_2, 370, 260, $path);
            }
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logo = Helper::saveImage($logo, 73, 73, $path);
            }
            if ($request->hasFile('home_image')) {
                $home_image = $request->file('home_image');
                $home_img = Helper::saveImage($home_image, 215, 220, $path);
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
                    $service = new Service();
                    $service->service_title = $request->input('service_title');
                    $service->service_details = $request->input('service_details');
                    $service->slogan = $request->input('slogan');
                    $service->hero_image = $hero_img;
                    $service->thumbnail_image = $thumb_img;
                    $service->image_1 = $img_1;
                    $service->image_2 = $img_2;
                    $service->logo = $logo;
                    $service->home_image = $home_img;
                    $service->video_link = $request->input('video_link');
                    $service->save(); //
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
    public function show(Service $service, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.services.show', compact('service'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.services.edit', compact('service'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        if ($request->ajax()) {
            $rules = [
                'service_title' => 'required',
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
                    $service = Service::findOrFail($service->id);
                    $path = "services";
                    if ($request->hasFile('thumb_image')) {
                        $thumb_path = $path . "/thumbnail";
                        if (!empty($request->file('thumb_image'))) {
                            if (File::exists($service->thumbnail_image)) {
                                $file_old = $service->thumbnail_image;
                                unlink($file_old);
                            }
                            $thumbnail_image = $request->file('thumbnail_image');
                            $thumb_img = Helper::saveImage($thumbnail_image, 370, 340, $thumb_path);
                        }
                    } else {
                        $thumb_img = $service->thumbnail_image;
                    }
                    if ($request->hasFile('hero_image')) {
                        if (!empty($request->file('hero_image'))) {
                            if (File::exists($service->hero_image)) {
                                $file_old = $service->hero_image;
                                unlink($file_old);
                            }
                            $hero_image = $request->file('hero_image');
                            $hero_img = Helper::saveImage($hero_image, 772, 840, $path);
                        }
                    } else {
                        $hero_img = $service->hero_image;
                    }
                    if ($request->hasFile('image_1')) {
                        if (!empty($request->file('image_1'))) {
                            if (File::exists($service->image_1)) {
                                $file_old = $service->image_1;
                                unlink($file_old);
                            }
                            $image_1 = $request->file('image_1');
                            $img_1 = Helper::saveImage($image_1, 370, 260, $path);
                        }
                    } else {
                        $img_1 = $service->image_1;
                    }
                    if ($request->hasFile('image_2')) {
                        if (!empty($request->file('image_2'))) {
                            if (File::exists($service->image_2)) {
                                $file_old = $service->image_2;
                                unlink($file_old);
                            }
                            $image_2 = $request->file('image_2');
                            $img_2 = Helper::saveImage($image_2, 370, 260, $path);
                        }
                    } else {
                        $img_2 = $service->image_2;
                    }
                    if ($request->hasFile('logo')) {
                        if (!empty($request->file('logo'))) {
                            if (File::exists($service->logo)) {
                                $file_old = $service->logo;
                                unlink($file_old);
                            }
                            $logo = $request->file('logo');
                            $logo = Helper::saveImage($logo, 370, 260, $path);
                        }
                    } else {
                        $logo = $service->logo;
                    }
                    if ($request->hasFile('home_image')) {
                        if (!empty($request->file('home_image'))) {
                            if (File::exists($service->home_image)) {
                                $file_old = $service->home_image;
                                unlink($file_old);
                            }
                            $home_image = $request->file('home_image');
                            $home_image = Helper::saveImage($home_image, 215, 220, $path);
                        }
                    } else {
                        $home_image = $service->home_image;
                    }


                    $service->service_title = $request->input('service_title');
                    $service->service_details = $request->input('service_details');
                    $service->slogan = $request->input('slogan');
                    $service->hero_image = $hero_img;
                    $service->thumbnail_image = $thumb_img;
                    $service->image_1 = $img_1;
                    $service->image_2 = $img_2;
                    $service->logo = $logo;
                    $service->home_image = $home_image;
                    $service->video_link = $request->input('video_link');
                    $service->save();
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
                } catch (Exception $e) {
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
    public function destroy(Service $service, Request $request)
    {
        if ($request->ajax()) {
            $service->delete();
            return response()->json(['type' => 'success', 'message' => 'Successfully Deleted']);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
