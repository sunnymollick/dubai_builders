<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use App\Models\Backend\Project;
use App\Models\Frontend\JobApplication;
use App\Models\Frontend\Quotation;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $admin_id = Session::get("adminId");
        $pending_quotation_request = Quotation::where('is_replied',1)->count();
        $running_project = Project::count();
        $total_customers = Client::count();
        $job_application = JobApplication::where('is_replied',1)->count();
        $recent_projects = Project::join('clients','projects.client_id','clients.id')
                                    ->where('projects.is_frontend',0)
                                    ->limit(10)
                                    ->get();
        // dd($recent_projects);
        return view('backend.pages.index',compact('running_project','pending_quotation_request','total_customers','job_application','recent_projects'));
    }

    public function profile()
    {
        $admin_id = Session::get("adminId");
        $admin_info = User::where('id', $admin_id)->first();
        return view('backend.pages.profile', compact('admin_info'));
    }
}
