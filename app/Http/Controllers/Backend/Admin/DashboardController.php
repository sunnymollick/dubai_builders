<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $admin_id = Session::get("adminId");
        $admin_info = User::where('id', $admin_id)->first();
        return view('backend.pages.index', compact('admin_info'));
    }
    public function profile()
    {
        $admin_id = Session::get("adminId");
        $admin_info = User::where('id', $admin_id)->first();
        return view('backend.pages.profile', compact('admin_info'));
    }
}
