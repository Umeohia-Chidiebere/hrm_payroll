<?php

namespace App\Models\settings;

use App\Models\expenditure;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mda extends Model
{
    use HasFactory;
    protected $guarded = [];

    function grade()
    {
        return $this->hasMany(grade::class)->whereIs_deleted(0);
    }

    function user()
    {
        return $this->hasMany(User::class)->whereIs_deleted(0)->whereEmployee_st(1);
    }

    function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(['name'=>'']);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['Name'] = ucwords(strtolower($value));
    }

    public function getNameAttribute($value)
    {
        return ucwords(strtolower($value) );
    }

    function expenditure()
    {
        return $this->hasMany(expenditure::class)->whereIs_approved(1)->whereMonth('updated_at', Carbon::now()->month );
    }
}
