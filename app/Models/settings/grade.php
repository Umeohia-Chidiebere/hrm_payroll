<?php

namespace App\Models\settings;

use App\Models\settings\mda;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    protected $guarded = [];

    function mda()
    {
        return $this->belongsTo(mda::class)->withDefault(['name'=>'']);
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
}
