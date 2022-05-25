<?php

namespace App\Models;

use App\Models\settings\mda;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenditure extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['is_deleted'];

    function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name'=>'']);
    }

    function mda()
    {
        return $this->belongsTo(mda::class)->withDefault(['name'=>'']);
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('D, M d, Y - H:ia', strtotime($value) );
    }

    function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by')->withDefault(['username'=>'']);
    }

}
