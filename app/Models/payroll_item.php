<?php

namespace App\Models;

use App\Models\settings\grade;
use App\Models\settings\mda;
use App\Models\settings\step;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll_item extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['is_deleted'];

    function payroll()
    {
        return $this->belongsTo(payroll::class)->withDefault(['name'=>'']); 
    }

    function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name'=>'']);
    }

    function mda()
    {
        return $this->belongsTo(mda::class)->withDefault(['name'=>'']);
    }

    function grade()
    {
        return $this->belongsTo(grade::class)->withDefault(['name'=>'']);
    }

    function step()
    {
        return $this->belongsTo(step::class)->withDefault(['name'=>'']);
    }

    function bank()
    {
        return $this->belongsTo(bank::class)->withDefault(['name'=>'']);
    }
}
