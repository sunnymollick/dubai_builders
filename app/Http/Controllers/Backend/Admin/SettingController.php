<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.settings.index');
    }

    public function getSettings(Request $request)
    {
        if ($request->ajax()) {

            $settings = Setting::orderby('created_at', 'desc')->get();

            return Datatables::of($settings)

                ->addColumn('action', function ($settings) {
                    $html = '<div class="btn-group">';
                    $html .= '<a data-toggle="tooltip"  id="' . $settings->id . '" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>';
                    $html .= '<a data-toggle="tooltip"  id="' . $settings->id . '" class="btn btn-info mr-1 edit" title="Edit"><i class="lni lni-pencil-alt"></i> </a>';
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
    public function show(Setting $setting, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.settings.show', compact('setting'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting, Request $request)
    {
        if ($request->ajax()) {
            $view = View::make('backend.pages.settings.edit', compact('setting'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
        if ($request->ajax()) {

            $settings = Setting::findOrFail($setting->id);
            $logo = $settings->app_logo;
            $rules = [
                'app_name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone_1' => 'required',
                'app_logo' => 'image|mimes:jpeg,png,jpg',
                'footer_text' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['type' => 'error', 'errors' => $validator->getMessageBag()->toArray()]);
            } else {

                $file_path = $this->handleImageUpload($request, $settings);


                $settings->app_name = $request->input('app_name');
                $settings->email = $request->input('email');
                $settings->address = $request->input('address');
                $settings->phone_1 = $request->input('phone_1');
                $settings->phone_2 = $request->input('phone_2');
                $settings->opening_time = $request->input('opening_time');
                $settings->fb_link = $request->input('fb_link');
                $settings->twitter_link = $request->input('twitter_link');
                $settings->dribble_link = $request->input('dribble_link');
                $settings->instragram_link = $request->input('instragram_link');
                $settings->linkedin_link = $request->input('linkedin_link');
                $settings->maps = $request->input('maps');
                $settings->footer_text = $request->input('footer_text');
                $settings->created_at = Carbon::now();
                $settings->updated_at = Carbon::now();
                $settings->save();

                return response()->json(['type' => 'success', 'message' => "Successfully Updated"]);
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    // Private function to handle image upload
    private function handleImageUpload(Request $request, $settings)
    {
        if ($request->hasFile('app_logo')) {
            $extensionLogo = strtolower($request->file('app_logo')->getClientOriginalExtension());

            if ($extensionLogo == 'jpg' || $extensionLogo == 'jpeg' || $extensionLogo == 'png') {
                if ($request->file('app_logo')->isValid()) {
                    $image = Image::make($request->file('app_logo'));
                    $imageName = time() . '-' . $request->file('app_logo')->getClientOriginalName();
                    $destinationPath = 'backend/assets/images/logo/';
                    $image->save($destinationPath . $imageName);
                    $file_path = $destinationPath . $imageName;
                    unlink($settings->app_logo); // Delete old logo
                    $settings->app_logo = $file_path;
                } else {
                    return response()->json(['type' => 'error', 'message' => "<div class='alert alert-warning'>File is not valid</div>"]);
                }
            } else {
                return response()->json(['type' => 'error', 'message' => "<div class='alert alert-warning'>Error! File type is not valid</div>"]);
            }
        }

        return isset($file_path) ? $file_path : $settings->app_logo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
