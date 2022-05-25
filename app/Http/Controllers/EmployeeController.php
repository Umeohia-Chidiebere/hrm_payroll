<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\app_traits;
use App\Models\employee_allowance;
use App\Models\employee_deduction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use app_traits;

    function index()
    {
        $employees = $this->all_employees();
        return view("pages.employees", compact('employees'));
    }

    function register_employee()
    {
        $data = request()->except(["_token", "grade_id", 'update_profile','password', 'username', 'status']);
        $data['created_by'] = auth()->id();
        $data['mda_id'] = $this->mda_id_(request()->grade_id);
        $data['grade_id'] = $this->grade_id_(request()->grade_id);
        $data['employee_st'] = 1;
        if( request()->update_profile ):
            if( request()->password ) $data['password'] = bcrypt( request()->password );
            if( request()->status ) $data['status'] = request()->status;
            $save = User::find( request()->id )->update( $data );
        else:
            $this->validate_employee_unique_data();
            $save = User::create( $data );
        endif;  
        return ! $save ? back()->withErrors(['Failed, Something went wrong.. !']) : back()->withSuccess('Success... ');
    }

    function delete_employee()
    {
        User::find( request()->employee_id )->update(['is_deleted' => 1]);
        return back()->withSuccess("Deleted Successfully...");
    }

    function store_employee_allowance()
    {
        $save = employee_allowance::create( request()->except('_token'));
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function store_employee_deduction()
    {
        $carbon = new Carbon();
        $data = request()->except('_token');
        $data['due_date'] = $carbon->addMonths( request()->due_date );
    
        // $start_date = Carbon::now();
        // $due_date = Carbon::parse( $data['due_date'] );
        // return $start_date->diffInMonths( $due_date );

        $save = employee_deduction::create( $data );
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function delete_employee_allowance()
    {
        $save = employee_allowance::find( request()->id )->delete();
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function delete_employee_deduction()
    {
        $save = employee_deduction::find( request()->id )->delete();
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function fetch_employee_allowance()
    {
        if( request()->delete_employee_allowance ){
            $this->delete_employee_allowance();
            return;
        }
        return $this->employee_allowances( request()->user_id );
    }

    function fetch_employee_deduction()
    {
        if( request()->delete_employee_deduction ){
            $this->delete_employee_deduction();
            return;
        }
        return $this->employee_deductions( request()->user_id );
    }
}

