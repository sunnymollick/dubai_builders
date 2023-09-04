<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function projects()
    {
        $projects = Project::all();
        return view('frontend.pages.projects', compact('projects'));
    }
    public function runningProjects()
    {
        $projects = Project::all();
        return view('frontend.pages.running_projects', compact('projects'));
    }

    public function detailsProjects($id)
    {
$details = Project::find($id);
        return view('frontend.pages.details_projects',compact('details'));
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function services()
    {
        return view('frontend.pages.services');
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
}
