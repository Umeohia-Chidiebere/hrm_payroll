<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_deduction extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['is_deleted'];

    function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name'=>'']);
    }

    function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(['name'=>'']);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('D, M d, Y - h:ia', strtotime($value) );
    }

    public function getStartDateAttribute($value)
    {
        return date('D, M d, Y', strtotime($value) );
    }

    public function getDueDateAttribute($value)
    {
        return date('D, M d, Y', strtotime($value) );
    }
}
