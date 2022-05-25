<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\settings\grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    use app_traits;
    
    function index()
    {
        $all_mda = $this->all_grades_();
        return view('pages.settings.grades', compact('all_mda'));
    }

    function fetch_all_grades()
    {
        return $this->all_grades_();
    }

    function find_single_grade_record()
    {
        return $this->query_data(new grade)->whereId( request()->id )->first();
    }

    function store_()
    {
        $data = request()->except("_token");
        $data['created_by'] = auth()->id();
        $save = grade::create( $data );
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function update_()
    {
        $data = request()->except("_token");
        $update = grade::find( request()->id )->update( $data );
        return ! $update ? $this->error_msg() : $this->success_msg();
    }

    function delete_()
    {
        $update = grade::find( request()->id )->update([ 'is_deleted' => 1 ]);
        return ! $update ? $this->error_msg() : $this->success_msg();
    }
}
