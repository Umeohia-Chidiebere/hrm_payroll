<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\settings\allowance;
use App\Models\settings\allowance_item;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    use app_traits;

    function index()
    {
        return view('pages.settings.allowance');
    }

    function fetch_allowances_item()
    {
        return $this->all_allowances_item();
    }

    function get_calculated_percentage_allowance_amount( $allowance_id, $percentage)
    {
        $allowance = $this->query_data(new allowance)->whereId( $allowance_id )->first();
        $basic_salary = $this->get_basic_salary( $allowance->mda_id, $allowance->grade_id, $allowance->step_id );
        $amount = ( $percentage / 100 ) * $basic_salary;
        return $amount;
    }

    function update_allowance_items()
    {
        $allowance_amount = request()->amount;
        if( request()->type == 'percentage_'):
            $allowance_amount = $this->get_calculated_percentage_allowance_amount( request()->allowance_id,  request()->amount );
        endif;
        if( request()->has('delete_item')):
            $this->delete_allowance_items();
            return;
        endif;
        $data = request()->except('_token', 'type');
        $data['amount'] = $allowance_amount;
        $store = allowance_item::create( $data );
        return ! $store ? $this->error_msg() : $this->success_msg();
    }

    function delete_allowance_items()
    {
        $delete = allowance_item::find( request()->id )->delete();
        return ! $delete ? $this->error_msg() : $this->success_msg();
    }

    function fetch_all_allowance_record()
    {
        return $this->all_allowances();
    }

    function find_single_allowance_record()
    {
        return $this->query_data(new allowance)->whereId( request()->id )->first();
    }

    function store_()
    {
        $data = request()->except(["_token", "grade_id"]);
        $data['created_by'] = auth()->id();
        $data['mda_id'] = $this->mda_id_(request()->grade_id);
        $data['grade_id'] = $this->grade_id_(request()->grade_id);
        $save = allowance::create( $data );
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function update_()
    {
        $data = request()->except("_token");
        $data['mda_id'] = $this->mda_id_(request()->grade_id);
        $data['grade_id'] = $this->grade_id_(request()->grade_id);
        $update = allowance::find( request()->id )->update( $data );
        return ! $update ? $this->error_msg() : $this->success_msg();
    }

    function delete_()
    {
        $update = allowance::find( request()->id )->update(['is_deleted' => 1 ]);
        return ! $update ? $this->error_msg() : $this->success_msg();
    }
}
