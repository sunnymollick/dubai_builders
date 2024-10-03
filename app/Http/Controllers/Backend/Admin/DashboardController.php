<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use App\Models\Backend\Project;
use App\Models\Backend\QuotationApplication;
use App\Models\Frontend\JobApplication;
use App\Models\Frontend\Quotation;
use App\Models\InvoicePayment;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $admin_id = Session::get("adminId");
        $pending_quotation_request = Quotation::where('is_replied',0)->count();
        $running_project = Project::count();
        $total_customers = Client::count();
        $job_application = JobApplication::where('is_replied',1)->count();
        $recent_projects = Project::join('clients','projects.client_id','clients.id')
                                    ->where('projects.is_frontend',0)
                                    ->limit(10)
                                    ->get();
        $total_project_grand_total = QuotationApplication::get()->where('is_confirmed',1)->sum('grand_total');

        $total_project_discount = QuotationApplication::get()->where('is_confirmed',1)->sum('discount_amount');
        $total_project_discount = number_format($total_project_discount,2);

        $total_project_tax = QuotationApplication::get()->where('is_confirmed',1)->sum('tax');
        $total_project_tax = $total_project_grand_total*($total_project_tax/100);
        $total_project_tax = number_format($total_project_tax,2);

        $total_project_collection_cash = InvoicePayment::where('payment_method','=','Cash')->get()->sum('paid_amount');
        $total_project_collection_bank = InvoicePayment::
                                        where('payment_method','=','Cheque')
                                        ->orWhere('payment_method','=','Card')
                                        ->get()->sum('paid_amount');
        $total_project_due = number_format($total_project_grand_total - ($total_project_collection_cash+$total_project_collection_bank),2);
        $total_project_grand_total = number_format($total_project_grand_total,2);
        $total_project_collection_cash = number_format($total_project_collection_cash,2);
        $total_project_collection_bank = number_format($total_project_collection_bank,2);
        return view('backend.pages.index',compact('running_project','pending_quotation_request','total_customers','job_application','recent_projects','total_project_due','total_project_grand_total','total_project_collection_cash','total_project_collection_bank','total_project_tax','total_project_discount'));
    }

    public function profile()
    {
        $admin_id = Session::get("adminId");
        $admin_info = User::where('id', $admin_id)->first();
        return view('backend.pages.profile', compact('admin_info'));
    }

    public function editProfile(Request $request){
        try {
            $admin_id = Session::get("adminId");
            $admin_info = User::where('id', $admin_id)->first();
            $admin_info->name = $request->name;
            $admin_info->email = $request->email;
            if ($request->password != '') {
                $admin_info->password = Hash::make($request->password);
            }
            $admin_info->save();
            return redirect()->back()->with('success', "Your profile have been updated");
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
