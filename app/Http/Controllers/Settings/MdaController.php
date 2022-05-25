<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\app_traits;
use App\Models\settings\mda;
use Illuminate\Http\Request;

class MdaController extends Controller
{
    use app_traits;

    function index()
    {
        return view('pages.settings.mda');
    }

    function fetch_all_mdas()
    {
        return $this->all_mdas_();
    }

    function find_single_mda_record()
    {
        return $this->query_data(new mda)->whereId( request()->id )->first();
    }

    function store_()
    {
        $data = request()->except("_token");
        $data['created_by'] = auth()->id();
        $save = mda::create( $data );
        return ! $save ? $this->error_msg() : $this->success_msg();
    }

    function update_()
    {
        $data = request()->except("_token");
        $update = mda::find( request()->id )->update( $data );
        return ! $update ? $this->error_msg() : $this->success_msg();
    }

    function delete_()
    {
        $update = mda::find( request()->id )->update([ 'is_deleted' => 1 ]);
        return ! $update ? $this->error_msg() : $this->success_msg();
    }
}
