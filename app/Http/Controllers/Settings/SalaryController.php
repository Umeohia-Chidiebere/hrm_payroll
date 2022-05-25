<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\settings\salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    use app_traits;

    function index()
    {
        return view('pages.settings.salary');
    }

    function fetch_all_salaries_record()
    {
        return $this->query_data(new salary)->with('grade', 'mda', 'step', 'created_by:id,username,email')->latest()->get();
    }

    function find_single_salary_record()
    {
        return $this->query_data(new salary)->whereId( request()->id )->first();
    }

    function store_()
    {
        $data = request()->except(["_token", "grade_id"]);
        $data['created_by'] = auth()->id();
        $data['mda_id'] = $this->mda_id_(request()->grade_id);
        $data['grade_id'] = $this->grade_id_(request()->grade_id);
        $save = salary::create( $data );
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function update_()
    {
        $data = request()->except("_token");
        $data['mda_id'] = $this->mda_id_(request()->grade_id);
        $data['grade_id'] = $this->grade_id_(request()->grade_id);
        $update = salary::find( request()->id )->update( $data );
        return ! $update ? $this->error_msg() : $this->success_msg();
    }

    function delete_()
    {
        $update = salary::find( request()->id )->update(['is_deleted' => 1 ]);
        return ! $update ? $this->error_msg() : $this->success_msg();
    }
}

