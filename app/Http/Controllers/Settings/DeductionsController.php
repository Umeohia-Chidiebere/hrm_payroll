<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\settings\deduction;
use App\Models\settings\deduction_item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeductionsController extends Controller
{
    use app_traits;

    function index()
    {
        return view('pages.settings.deductions');
    }

    function fetch_deductions_item()
    {
        return $this->all_deductions_item();
    }

    function get_calculated_percentage_deduction_amount( $deduction_id, $percentage)
    {
        $deduction = $this->query_data(new deduction)->whereId( $deduction_id )->first();
        $basic_salary = $this->get_basic_salary( $deduction->mda_id, $deduction->grade_id, $deduction->step_id );
        $amount = ( $percentage / 100 ) * $basic_salary;
        return $amount;
    }

    function update_deduction_items()
    {
        $deduction_amount = request()->amount;
        if( request()->type == 'percentage_'):
            $deduction_amount = $this->get_calculated_percentage_deduction_amount( request()->deduction_id,  request()->amount );
        endif;
        if( request()->has('delete_item') ):
            $this->delete_deduction_item();
            return;
        endif;
        $data = request()->except('_token', 'type');
        $data['amount'] = $deduction_amount;
        $store = deduction_item::create( $data );
        return ! $store ? $this->error_msg() : $this->success_msg();
    }

    function delete_deduction_item()
    {
        $delete = deduction_item::find( request()->id )->delete();
        return ! $delete ? $this->error_msg() : $this->success_msg();
    }

    function fetch_all_deduction_record()
    {
        return $this->all_deductions();
    }

    function find_single_deduction_record()
    {
        return $this->query_data(new deduction)->whereId( request()->id )->first();
    }

    function store_()
    {
        $data = request()->except(["_token", "grade_id"]);
        $data['created_by'] = auth()->id();
        $data['mda_id'] = $this->mda_id_(request()->grade_id);
        $data['grade_id'] = $this->grade_id_(request()->grade_id);
        $save = deduction::create( $data );
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function update_()
    {
        $data = request()->except("_token");
        $data['mda_id'] = $this->mda_id_(request()->grade_id);
        $data['grade_id'] = $this->grade_id_(request()->grade_id);
        $update = deduction::find( request()->id )->update( $data );
        return ! $update ? $this->error_msg() : $this->success_msg();
    }

    function delete_()
    {
        $update = deduction::find( request()->id )->update(['is_deleted' => 1 ]);
        return ! $update ? $this->error_msg() : $this->success_msg();
    }
    
}
