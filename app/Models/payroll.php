<?php

namespace App\Models;

use App\Http\Controllers\Traits\app_traits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    use HasFactory;
    use app_traits;
    protected $guarded = [];
    protected $hidden = ['is_deleted'];

    function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault(['name'=>'']);
    }

    public function getToAttribute($value)
    {
        return date('D, M d, Y', strtotime($value) );
    }

    public function getFromAttribute($value)
    {
        return date('D, M d, Y', strtotime($value) );
    }
    
    function payroll_items()
    {
        return $this->hasMany(payroll_item::class)->whereIs_deleted(0);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($payroll_items_){
            foreach($payroll_items_->payroll_items()->get() as $item){
                $item->delete();
            }
        });
    }

}
