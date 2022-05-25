<?php
namespace App\Http\Controllers\Traits;

use App\Models\employee_allowance;
use App\Models\employee_deduction;
use App\Models\settings\allowance;
use App\Models\settings\allowance_item;
use App\Models\settings\deduction;
use App\Models\settings\deduction_item;
use App\Models\settings\mda;
use App\Models\settings\grade;
use App\Models\settings\salary;
use App\Models\settings\step;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait app_traits{

    use validation_trait;

    function query_data( $model )
    {
        return $model->whereIs_deleted(0);
    }

    function search_( $mda_id = '', $grade_id = '', $step_id = '', $model = '')
    {
        return $this->query_data($model)
                    ->whereMda_id( $mda_id )
                    ->whereGrade_id( $grade_id )
                    ->whereStep_id( $step_id );
    }

    function get_total_general_allowance( $mda_id = '', $grade_id = '', $step_id = '')
    {
        $data = $this->search_($mda_id, $grade_id, $step_id, new allowance)
                     ->with('allowance_item')
                     ->first();
        return ( $data ) ? $data->allowance_item()->sum('amount') : 0;
    }

    function get_total_general_deduction( $mda_id = '', $grade_id = '', $step_id = '')
    {
        $data = $this->search_($mda_id, $grade_id, $step_id, new deduction)
                    ->with('deduction_item')
                    ->first();
        return ( $data ) ?  $data->deduction_item()->sum('amount') : 0;
    }

    function get_total_personal_allowance($employee_id)
    {
        return $this->query_data( new employee_allowance )
                    ->whereUser_id( $employee_id )
                    ->sum('amount');
    }

    function get_total_personal_deduction($employee_id)
    {
        return $this->query_data( new employee_deduction )
                    ->whereUser_id( $employee_id )
                    ->sum('amount');
    }

    function all_employees()
    {
        return $this->query_data(new User)
                    ->whereEmployee_st(1)
                    ->with('mda:id,name','bank:id,name','grade:id,name','step:id,name','created_by:id,username,email')
                    ->latest('updated_at')
                    ->get();
    }

    function employee_allowances( $user_id ) 
    {
        return $this->query_data(new employee_allowance)
                    ->whereUser_id( $user_id )
                    ->with('created_by:id,username,email')
                    ->latest()
                    ->get();
    }

    /**
     * Status == 1 - Employee has cleared his Loan/Deductions
     * Status == 0. - Employee stil have active Deductions
     */
    function employee_deductions( $user_id, $status = '')
    {
        $data = $this->query_data(new employee_deduction)->whereUser_id( $user_id );
        if( $status ) $data = $data->whereStatus( $status );
        return $data->with('created_by:id,username,email')
                    ->latest()
                    ->get();
    }

    function get_basic_salary($mda_id = '', $grade_id = '', $step_id = '')
    {
        return $this->search_($mda_id, $grade_id, $step_id, new salary)
                    ->sum('amount');
    }

    function all_allowances()
    {
        return $this->query_data(new allowance)->with('grade', 'mda', 'step', 'created_by:id,username,email')->latest()->get();
    }

    function all_deductions()
    {
        return $this->query_data(new deduction)->with('grade', 'mda', 'step', 'created_by:id,username,email')->latest()->get();
    }

    function all_deductions_item()
    {
        $query = $this->query_data(new deduction_item);
        if( request()->id ) $query = $query->whereDeduction_id( request()->id);
        return $query->with('deduction','created_by:id,username,email')->latest()->get();
    }

    function all_allowances_item()
    {
        $query = $this->query_data(new allowance_item);
        if( request()->id ) $query = $query->whereAllowance_id( request()->id);
        return $query->with('allowance','created_by:id,username,email')->latest()->get();
    }

    function all_mdas_()
    {
        return $this->query_data(new mda)->with('grade','created_by:id,username,email')->latest()->get();
    }

    function all_steps_level()
    {
        return $this->query_data(new step)->with('created_by:id,username,email')->latest()->get();
    }

    function all_grades_()
    {
        return $this->query_data(new grade)->with('mda','created_by:id,username,email')->latest()->get();
    }
    
    function error_msg( $msg = "Failed ! Something went wrong")
    {
        return response()->json(["error" => $msg ]);
    }

    function success_msg( $msg = "Success... ")
    {
        return response()->json(["success" => $msg ]);
    }

    function random_strings( $num = 20 )
    {
        return Str::random( $num );
    }

    function mda_id_($data)
    {
        return explode("/", $data)[1];
    }

    function grade_id_($data)
    {
        return explode("/", $data)[0];
    }
  
}