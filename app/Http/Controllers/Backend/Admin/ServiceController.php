<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Backend\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
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

            $rules = [
                'service_title' => 'required',
            ];
            if ($request->hasFile('hero_image')) {
                $hero_image = $request->file('hero_image');
                $image_rename = hexdec(uniqid('', false)) . '.' . $hero_image->getClientOriginalExtension();
                Image::make($hero_image)->resize(370, 340)->save('backend/uploads/images/services/thumbnail/' . $image_rename);
                $image_url = 'backend/uploads/images/services/thumbnail/' . $image_rename;
                $thumbnail_img = $image_url;
            }
            if ($request->hasFile('hero_image')) {
                $hero_image = $request->file('hero_image');
                $hero_img = Helper::saveServiceImage($hero_image, 772, 480);
            }
            if ($request->hasFile('image_1')) {
                $image_1 = $request->file('image_1');
                $img_1 = Helper::saveServiceImage($image_1, 370, 260);
            }
            if ($request->hasFile('image_2')) {
                $image_2 = $request->file('image_2');
                $img_2 = Helper::saveServiceImage($image_2, 370, 260);
            }
            if ($request->hasFile('logo')) {
                $logo = $request->file('image_2');
                $logo = Helper::saveServiceImage($image_2, 73, 73);
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
                    $service->thumbnail_image = $thumbnail_img;
                    $service->image_1 = $img_1;
                    $service->image_2 = $img_2;
                    $service->logo = $logo;
                    $service->video_link = $request->input('video_link');
                    $service->save(); //
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
