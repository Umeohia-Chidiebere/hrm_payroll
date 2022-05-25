<?php

namespace App\Models\settings;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deduction_item extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['is_deleted'];

    function deduction()
    {
        return $this->belongsTo(deduction::class)->withDefault(['name'=>'']);
    }

    function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(['name'=>'']);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    } 
}
