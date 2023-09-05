<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Session::has('userid')) {
            return redirect()->to('admin/dashboard');
        }
        return view('backend.layouts.login');
    }

    public function loginStore(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', '=', $email)->first();


        if ($user) {
            if (Hash::check($password, $user->password)) { // password matched
                Session::put('adminId', $user->id);
                Session::put('useremail', $user->email);
                return redirect()->to('admin/dashboard')->with('success', 'Welcome To Dashboard');
            } else {
                return redirect()->to('admin_login/login')->with('error', 'The password you entered is incorrect');
            }
        } else {
            return redirect()->back()->with('error', "The email you entered is incorrect");
        }
    }

    public function logout(){
        session::flush();
        return redirect()->to('/');
    }
}
