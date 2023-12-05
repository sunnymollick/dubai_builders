<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Backend\Blog;
use App\Models\Backend\Contact;
use App\Models\backend\Career;
use App\Models\Backend\Project;
use App\Models\Backend\Slider;
use App\Models\Backend\Team;
use App\Models\Backend\Service;
use App\Models\Frontend\JobApplication;
use App\Models\Frontend\Quotation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $all = Project::where('is_popular', '1')->orderby('id', 'desc')->limit(5)->get();
        $residential = Project::where('is_popular', '1')->where('project_type', '0')->orderby('id', 'desc')->limit(5)->get();
        $commercial = Project::where('is_popular', '1')->where('project_type', '1')->orderby('id', 'desc')->limit(5)->get();
        $highrise = Project::where('is_popular', '1')->where('project_type', '2')->orderby('id', 'desc')->limit(5)->get();
        $business = Project::where('is_popular', '1')->where('project_type', '3')->orderby('id', 'desc')->limit(5)->get();
        $completed = Project::where('project_status', '2')->count();
        $running = Project::where('project_status', '0')->count();
        $app_settings = Setting::findOrFail(1);
        $services = Service::orderby('service_title', 'desc')->get();
        $about = About::findOrFail(1);
        $completed_project = Project::where('project_status', '=', '2')->count();
        $ongoing_project = Project::where('project_status', '=', '0')->count();
        $blogs = Blog::orderby('id', 'desc')->limit(2)->get();
        $slider = Slider::where('is_active', '=', '1')->orderby('id', 'asc')->get();
        return view('frontend.pages.index', compact('residential', 'commercial', 'highrise', 'business', 'all', 'app_settings', 'services', 'completed', 'running', 'about', 'completed_project', 'ongoing_project', 'blogs', 'slider'));
    }
    public function contact()
    {

        $app_settings = Setting::findOrFail(1);
        $app_settings = Setting::findOrFail(1);
        return view('frontend.pages.contact', compact('app_settings'), compact('app_settings'));
    }
    public function storeContact(Request $request)
    {
        if ($request->ajax()) {

            $rules = [
                'name' => 'required',
                'subject' => 'required',
                'email' => 'required',
                'message' => 'required',
                'phone' => 'required',
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

                    $contact = new Contact();
                    $contact->name = $request->input('name');
                    $contact->subject = $request->input('subject');
                    $contact->email = $request->input('email');
                    $contact->phone = $request->input('phone');
                    $contact->message = $request->input('message');
                    $contact->save(); //
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
    public function completedProjects()
    {
        $all = Project::where('project_status', '2')->orderby('id', 'desc')->limit(5)->get();
        $residential = Project::where('project_status', '2')->where('project_type', '0')->orderby('id', 'desc')->limit(5)->get();
        $commercial = Project::where('project_status', '2')->where('project_type', '1')->orderby('id', 'desc')->limit(5)->get();
        $highrise = Project::where('project_status', '2')->where('project_type', '2')->orderby('id', 'desc')->limit(5)->get();
        $business = Project::where('project_status', '2')->where('project_type', '3')->orderby('id', 'desc')->limit(5)->get();
        return view('frontend.pages.completed_projects', compact('residential', 'commercial', 'highrise', 'business', 'all'));
    }
    public function runningProjects()
    {
        $all = Project::where('project_status', '0')->orderby('id', 'desc')->limit(5)->get();
        $residential = Project::where('project_status', '0')->where('project_type', '0')->orderby('id', 'desc')->limit(5)->get();
        $commercial = Project::where('project_status', '0')->where('project_type', '1')->orderby('id', 'desc')->limit(5)->get();
        $highrise = Project::where('project_status', '0')->where('project_type', '2')->orderby('id', 'desc')->limit(5)->get();
        $business = Project::where('project_status', '0')->where('project_type', '3')->orderby('id', 'desc')->limit(5)->get();
        return view('frontend.pages.running_projects', compact('residential', 'commercial', 'highrise', 'business', 'all'));
    }

    public function detailsProjects($id)
    {
        $details = Project::find($id);
        return view('frontend.pages.details_projects', compact('details'));
    }
    public function about()
    {
        $about = About::findOrFail(1);
        $app_settings = Setting::findOrFail(1);
        return view('frontend.pages.about', compact('about', 'app_settings'));
    }
    public function services()
    {
        $all = Service::orderby('service_title', 'asc')->paginate(9);
        return view('frontend.pages.services', compact('all'));
    }

    public function servicesDetails($id)
    {
        $details = Service::find($id);
        return view('frontend.pages.service_details', compact('details'));
    }
    public function team()
    {
        $teams = Team::orderby('order', 'asc')->get();
        return view('frontend.pages.team', compact('teams'));
    }
    public function teamShow($id)
    {
        $team_details = Team::find($id);
        return response()->json($team_details);
    }
    public function faq()
    {
        return view('frontend.pages.faq');
    }
    public function careers()
    {
        $careers = Career::where('is_active', 'active')->orderby('created_at', 'desc')->paginate(9);
        return view('frontend.pages.careers.careers', compact('careers'));
    }

    public function blogs()
    {
        $blogs = Blog::where('is_publish', 1)->orderby('id', 'desc')->paginate(9);
        return view('frontend.pages.blogs', compact('blogs'));
    }

    public function blogDetails(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.pages.blog_details', compact('blog'));
    }

    public function job_application($id)
    {
        $job_app = Career::find($id);
        return view('frontend.pages.careers.job_application', compact('job_app'));
    }

    public function storeQuotationRequest(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'name' => 'required',
                'location' => 'required',
                'email' => 'required',
                'message' => 'required',
                'mobile' => 'required',
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
                    $quotation = new Quotation();

                    if ($request->hasFile('file')) {
                        $dextension = $request->file('file')->getClientOriginalExtension();
                        if ($dextension == "pdf" || $dextension == "doc" || $dextension == "docx") {
                            if ($request->file('file')->isValid()) {
                                $dPath = public_path('backend\uploads\images\quotation_request');
                                $dName = time() . '.' . $dextension; // renameing image
                                $d_path = 'backend\uploads\images\quotation_request/' . $dName;
                                $request->file('file')->move($dPath, $d_path); // uploading file to given path
                                $quotation->file = $d_path;
                            } else {
                                return response()->json([
                                    'type' => 'error',
                                    'message' => "<div class='alert alert-warning'>File is not valid</div>",
                                ]);
                            }
                        } else {
                            return response()->json([
                                'type' => 'error',
                                'message' => "<div class='alert alert-warning'>Error! File type is not valid</div>",
                            ]);
                        }
                    }

                    $quotation->name = $request->input('name');
                    $quotation->location = $request->input('location');
                    $quotation->email = $request->input('email');
                    $quotation->mobile = $request->input('mobile');
                    $quotation->project_type = $request->input('project_type');
                    $quotation->evaluate_budget = $request->input('evaluate_budget');
                    $quotation->project_time = $request->input('project_time');
                    $quotation->company_name = $request->input('company_name');
                    $quotation->is_read = 0;
                    $quotation->message = $request->input('message');
                    $quotation->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Thank you ! We received your message ."]);
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


    public function storeJobApplication(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'name' => 'required',
                'location' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'file' => 'required'
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
                    $job_app = new JobApplication();

                    if ($request->hasFile('file')) {
                        $dextension = $request->file('file')->getClientOriginalExtension();
                        if ($dextension == "pdf" || $dextension == "doc" || $dextension == "docx") {
                            if ($request->file('file')->isValid()) {
                                $dPath = public_path('backend\uploads\files\cv');
                                $dName = time() . '.' . $dextension; // renameing image
                                $d_path = 'backend\uploads\files\cv/' . $dName;
                                $request->file('file')->move($dPath, $d_path); // uploading file to given path
                                $job_app->file = $d_path;
                            } else {
                                return response()->json([
                                    'type' => 'error',
                                    'message' => "<div class='alert alert-warning'>File is not valid</div>",
                                ]);
                            }
                        } else {
                            return response()->json([
                                'type' => 'error',
                                'message' => "<div class='alert alert-warning'>Error! File type is not valid</div>",
                            ]);
                        }
                    }

                    $job_app->name = $request->input('name');
                    $job_app->address = $request->input('location');
                    $job_app->email = $request->input('email');
                    $job_app->mobile = $request->input('mobile');
                    $job_app->is_read = 0;
                    $job_app->message = $request->input('message');
                    $job_app->save(); //
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Thank you ! We received your message ."]);
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
}
