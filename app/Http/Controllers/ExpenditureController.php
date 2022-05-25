<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\app_traits;
use App\Models\expenditure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    use app_traits;

    function index()
    {
        $expenditures = $this->get_expenditures_by_mda();
        return view("pages.expenditures", compact('expenditures') );
    }

    function get_expenditures_by_mda()
    {
        $records = $this->query_data( new expenditure )->whereMda_id( auth()->user()->mda_id );
        if( request()->search_ ){
            if( request()->approval_status_ == 1 ) $records = $records->whereIs_approved(1);
            if( request()->approval_status_ == 2 ) $records = $records->whereIs_approved(0);
            if( request()->month_ != 100 ) $records = $records->whereMonth('updated_at', request()->month_ );    
        }
        $records = $records->latest('updated_at')->get();
        return $records;
    }

    function all_expenditures()
    {
        $records = $this->query_data( new expenditure );
        if( request()->search_ ){
            if( request()->approval_status_ == 1 ) $records = $records->whereIs_approved(1);
            if( request()->approval_status_ == 2 ) $records = $records->whereIs_approved(0);
            if( request()->month_ != 100 ) $records = $records->whereMonth('updated_at', request()->month_ ); 
            if( request()->mda_id ) $records = $records->whereMda_id( request()->mda_id );    
        }
        $records = $records->latest()->get();
        return $records;
    }

    function expenditure_report()
    {
        $expenditures = $this->all_expenditures();
        return view('pages.expenditure_report', compact("expenditures"));
    }

    function store_expenditure()
    {
        if( request()->approve_expenditure_ ){
            $this->approve_expenditure();
            return back();
        }
        $data = request()->except("_token", 'file_');
        $file_name = null;
        $file_type = null;
        if( request()->hasFile('file_') ):   
            $file_ = request()->file('file_');
            $file_name = $this->random_strings();
            $file_type = $file_->getClientOriginalExtension();
            $directory = "uploads/expenditures/";
            $file_->move( $directory, $file_name.'.'.$file_type );
        endif;

        $data["file_name"] = $file_name;
        $data["file_type"] = $file_type;
        $data['user_id']   = auth()->id();
        $data['mda_id']    = auth()->user()->mda_id;
        $save = expenditure::create( $data );
        if( ! $save ) return back()->withErrors("Failed !");
        return back()->withSuccess("Expenditure Created Successfully...");
    }
    
    function delete_expenditure()
    {

    }

    function approve_expenditure()
    {
        expenditure::find( request()->id )->update(['is_approved' => 1, 'approved_by' => auth()->id() ]);
    }

}

