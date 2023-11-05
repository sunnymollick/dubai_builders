<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;

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

                ->addColumn('address', function ($settings) {
                    return Str::of($settings->address)->limit(20);;
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

                if ($request->hasFile('app_logo')) {
                    $app_logo = $request->file('app_logo');
                    $settings->app_logo =  Helper::saveImage($app_logo, 147, 48, 'logo');
                    if (!empty($setting->app_logo)) {
                        unlink($setting->app_logo);
                    }
                }

                $settings->app_name = $request->input('app_name');
                $settings->email = $request->input('email');
                $settings->email_secondary = $request->input('email_secondary');
                $settings->address = $request->input('address');
                $settings->address_secondary = $request->input('address_secondary');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
