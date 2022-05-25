<?php

namespace App\Models\settings;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deduction extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['is_deleted'];

    function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(['name'=>'']);
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

    function deduction_item()
    {
        return $this->hasMany(deduction_item::class)->whereIs_deleted(0);
    }
}
