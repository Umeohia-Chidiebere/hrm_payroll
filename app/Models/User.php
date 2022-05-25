<?php

namespace App\Models;

use App\Http\Controllers\Traits\app_traits;
use App\Models\settings\grade;
use App\Models\settings\mda;
use App\Models\settings\step;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use app_traits;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_deleted'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsernameAttribute($value)
    {
        return "@".explode('@', $this->email)[0];
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('D, M d, Y - h:ia', strtotime($value) );
    }

    public function getFirstnameAttribute($value)
    {
        //$this->attributes['firstname'] = ucwords(strtolower($value));
        $name = '';
        if( ! $value )
        {
            $names = explode(' ', $this->name );
                if( isset($names[1] ))
                {
                   $name = $names[1];
                }
        }else{
            $name = $value;
        }
        return ucwords( strtolower($name) );
    } 

    public function getLastnameAttribute($value)
    {
        $name = '';
        if( ! $value )
        {
            $names = explode(' ', $this->name );
                if( isset($names[0] ))
                {
                   $name = $names[0];
                }
        }else{
            $name = $value;
        }
        return ucwords( strtolower($name) );
    }

    public function getNameAttribute($value)
    {
         return ucwords( strtolower( $value ));
    }
    
    function fullnames()
    {
        return $this->lastname. ' '.$this->firstname. ' '. $this->other_name;
    }

    public function getOtherNameAttribute($value)
    {
        $name = '';
        if( ! $value )
        {
            $names = explode(' ', $this->name );
                if( isset($names[2] ))
                {
                   $name = $names[2];
                }
        }else{
            $name = $value;
        }
        return ucwords( strtolower($name) );
    }

    function all_bank_names()
    {
        return bank::all()->sortBy('name');
    }

    function fetch_all_mda()
    {
        return $this->all_mdas_()->sortBy('name');
    }

    function fetch_all_grades()
    {
        return $this->all_grades_()->sortBy('name');
    }

    function fetch_all_steps()
    {
        return $this->all_steps_level()->sortBy('name');
    }

    function bank()
    {
        return $this->belongsTo(bank::class)->withDefault(['name'=>'']);
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

    function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(['name'=>'']);
    }
}
