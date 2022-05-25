<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\settings\step;
use Illuminate\Http\Request;

class StepsController extends Controller
{
    use app_traits;
    function index()
    {
        return view('pages.settings.steps');
    }

    function fetch_all_steps()
    {
        return $this->all_steps_level();
    }

    function find_single_step_record()
    {
        return $this->query_data(new step)->whereId( request()->id )->first();
    }

    function store_()
    {
        $data = request()->except("_token");
        $data['created_by'] = auth()->id();
        $save = step::create( $data );
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function update_()
    {
        $data = request()->except("_token");
        $update = step::find( request()->id )->update( $data );
        return ! $update ? $this->error_msg() : $this->success_msg();
    }

    function delete_()
    {
        $update = step::find( request()->id )->update([ 'is_deleted' => 1 ]);
        return ! $update ? $this->error_msg() : $this->success_msg();
    }
}
