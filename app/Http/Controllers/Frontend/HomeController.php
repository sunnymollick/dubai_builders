<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Contact;
use App\Models\backend\Career;
use App\Models\Backend\Project;
use App\Models\Backend\Team;
use App\Models\Backend\Service;
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
        return view('frontend.pages.index', compact('residential', 'commercial', 'highrise', 'business', 'all', 'app_settings', 'services','completed', 'running'));
    }
    public function contact()
    {

        $app_settings = Setting::findOrFail(1);
        return view('frontend.pages.contact', compact('app_settings'));
    }
    public function storeContact(Request $request)
    {

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
                    // $client_name = Client::where('id', $request->client_id)->first();
                    $contact = new Contact();
                    $contact->name = $request->input('name');
                    $contact->subject = $request->input('subject');
                    $contact->email = $request->input('email');
                    $contact->phone = $request->input('phone');
                    $contact->message = $request->input('message');
                    $contact->save(); //
                    DB::commit();
                    return Redirect::back()->with('msg', 'Message sent successfully');
                } catch (\Exception $e) {
                    DB::rollback();
                    dd($e->getMessage());
                    return response()->json(['type' => 'error', 'message' => "Please Fill With Correct data"]);
                }
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
        return view('frontend.pages.about');
    }
    public function services()
    {
        $all = Service::orderby('service_title', 'asc')->limit(5)->get();
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
        $careers = Career::where('is_active', 'active')->get();
        return view('frontend.pages.careers.careers', compact('careers'));
    }
}
