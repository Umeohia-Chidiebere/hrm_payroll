<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\payroll;
use App\Models\payroll_item;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    use app_traits;
    
    function index()
    {
        $payrolls = $this->fetch_all_payrolls();
        return view('pages.settings.payroll', compact('payrolls') );
    }

    function print_payroll_list()
    {
        $payroll_items = $this->compute_payroll_items();
        return view('pages.print_payroll', compact('payroll_items'));
    }

    function fetch_all_payrolls()
    {
        return $this->query_data(new payroll)->latest('updated_at')->get();
    }

    function find_single_payroll_record()
    {
        return $this->query_data(new payroll)->whereId( request()->id )->first();
    }

    function view_payroll_items()
    {   
        $payroll_items = $this->compute_payroll_items();
        if(! count( $payroll_items ) ) {
            return redirect()->back()->withErrors("No Report was Found for the Search you made... ");
        }
        return view('pages.settings.payroll_list', compact('payroll_items'));
    }

    function compute_payroll_items()
    {
        $payroll_id = request()->id;
        if( request()->has('re_calculate_payroll')) $this->reset_payroll_items( $payroll_id );
        if(! $this->payroll_items( $payroll_id )->exists() ):
             $this->store_payroll_items( $payroll_id );
        endif;
        $payroll_items = $this->payroll_items( $payroll_id );
        if( request()->has('query_record') ):
            if( request()->mda_id ) $payroll_items = $payroll_items->whereMda_id( request()->mda_id );
            if( request()->grade_id ):
                $grade_id = $this->grade_id_( request()->grade_id );
                $mda_id = $this->mda_id_( request()->grade_id );
                $payroll_items = $payroll_items->whereGrade_id( $grade_id )
                                               ->whereMda_id( $mda_id );
            endif;
            if( request()->step_id ) $payroll_items = $payroll_items->whereStep_id( request()->step_id );
            if( request()->bank_id ) $payroll_items = $payroll_items->whereBank_id( request()->bank_id );
        endif;
        return $payroll_items->get() ;
    }

    function store_payroll_items( $payroll_id )
    {
        $employees = $this->all_employees(); 
        foreach( $employees as &$employee ):
            $data = [];
            $data['payroll_id'] = $payroll_id;
            $data['user_id'] = $employee->id;
            $data['mda_id'] = $employee->mda_id;
            $data['grade_id'] = $employee->grade_id;
            $data['step_id'] = $employee->step_id;
            $data['bank_id'] = $employee->bank_id;
            $data['basic_salary'] = $this->get_basic_salary( $employee->mda_id, $employee->grade_id, $employee->step_id );
            $data['total_general_allowance'] = $this->get_total_general_allowance( $employee->mda_id, $employee->grade_id, $employee->step_id );
            $data['total_general_deduction'] = $this->get_total_general_deduction( $employee->mda_id, $employee->grade_id, $employee->step_id );
            $data['total_personal_allowance'] = $this->get_total_personal_allowance( $employee->id );
            $data['total_personal_deduction'] = $this->get_total_personal_deduction( $employee->id ); 
            $data['net_salary'] = ( $data['total_general_allowance'] + $data['total_personal_allowance'] + $data['basic_salary'] ) - ( $data['total_personal_deduction'] + $data['total_general_deduction'] );
            payroll_item::create($data);
        endforeach;
        unset( $employee );
    }

    function payroll_items($payroll_id)
    {
        return $this->query_data( new payroll_item )
                    ->wherePayroll_id( $payroll_id )
                    ->latest();
    }

    function reset_payroll_items( $payroll_id )
    {
        payroll_item::wherePayroll_id( $payroll_id )->delete();
    }

    function register_payroll()
    {
        $data = request()->except("_token");
        $data['created_by'] = auth()->id();
        $data['ref_no'] = $this->random_strings(15);
        $save = payroll::create( $data );
        return ! $save ? back()->withErrors("Failed! Something went wrong..") : back()->withSuccess(" Created Successfully...");
    }

    function delete_payroll() 
    {
        payroll::find( request()->id )->delete();
        return back()->withSuccess("Deleted Successfully...");
    }
}
