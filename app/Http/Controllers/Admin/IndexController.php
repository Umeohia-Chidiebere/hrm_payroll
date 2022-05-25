<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\payroll;
use App\Models\payroll_item;
use App\Models\settings\mda;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use app_traits;

    function index()
    {
        $mdas = $this->all_mdas_();
        $total_employees = $this->all_employees()->count();
        $total_monthly_paid_salaries = $this->query_data( new payroll )
                                            ->whereMonth('from', Carbon::now()->month )
                                            ->with('payroll_items')
                                            ->latest()
                                            ->first();
        $total_monthly_paid_salaries ? $total_monthly_paid_salaries = $total_monthly_paid_salaries->payroll_items->sum('net_salary'): $total_monthly_paid_salaries = 0;
        $monthly_mda_expenditures = $this->query_data(new mda)->with('expenditure')->orderBy('name')->get();
        return view('pages.dashboard', compact('mdas', 'total_employees', 'total_monthly_paid_salaries', 'monthly_mda_expenditures'));
    }

    function admins()
    {
        $admins = $this->query_data(new User)->where('status', '!=', 0)->latest()->get();
        return view('pages.all_admins', compact('admins') );
    }
}
