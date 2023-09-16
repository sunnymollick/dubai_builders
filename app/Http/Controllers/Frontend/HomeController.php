<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Backend\Project;
use App\Models\Backend\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $all = Project::where('is_popular', '1')->orderby('id', 'desc')->limit(5)->get();
        $residential = Project::where('is_popular', '1')->where('project_type', '0')->orderby('id', 'desc')->limit(5)->get();
        $commercial = Project::where('is_popular', '1')->where('project_type', '1')->orderby('id', 'desc')->limit(5)->get();
        $highrise = Project::where('is_popular', '1')->where('project_type', '2')->orderby('id', 'desc')->limit(5)->get();
        $business = Project::where('is_popular', '1')->where('project_type', '3')->orderby('id', 'desc')->limit(5)->get();
        $app_settings = Setting::findOrFail(1);
        $about = About::findOrFail(1);
        $completed_project = Project::where('project_status','=','2')->count();
        $ongoing_project = Project::where('project_status','=','0')->count();
        return view('frontend.pages.index', compact('residential', 'commercial', 'highrise', 'business', 'all', 'app_settings','about','completed_project','ongoing_project'));
    }
    public function contact()
    {
        $app_settings = Setting::findOrFail(1);
        return view('frontend.pages.contact',compact('app_settings'));
    }
    public function projects()
    {
        $all = Project::where('project_status', '2')->orderby('id', 'desc')->limit(5)->get();
        $residential = Project::where('project_status', '2')->where('project_type', '0')->orderby('id', 'desc')->limit(5)->get();
        $commercial = Project::where('project_status', '2')->where('project_type', '1')->orderby('id', 'desc')->limit(5)->get();
        $highrise = Project::where('project_status', '2')->where('project_type', '2')->orderby('id', 'desc')->limit(5)->get();
        $business = Project::where('project_status', '2')->where('project_type', '3')->orderby('id', 'desc')->limit(5)->get();
        return view('frontend.pages.projects', compact('residential', 'commercial', 'highrise', 'business', 'all'));
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
        return view('frontend.pages.about',compact('about','app_settings'));
    }
    public function services()
    {
        $all = Service::orderby('service_title', 'asc')->limit(5)->get();
        return view('frontend.pages.services', compact('all'));
    }
    public function team()
    {
        return view('frontend.pages.team');
    }
    public function faq()
    {
        return view('frontend.pages.faq');
    }
    public function servicesDetails()
    {
        return view('frontend.pages.service_details');
    }

    public function blogs(){
        return view('frontend.pages.blogs');
    }

    public function blogDetails(Request $request,$id){
        return view('frontend.pages.blog_details');
    }
}
