<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        return view('frontend.pages.projects');
    }
    public function runningProjects()
    {
        return view('frontend.pages.running_projects');
    }

    public function detailsProjects()
    {
        return view('frontend.pages.details_projects');
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
