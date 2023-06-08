<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    
    protected $table      = 'order_status';
    protected $primaryKey = 'id';
    protected $fillable   = ['status_name'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function orders_status(){
        return $this->hasMany(Order::class,'status_id');
    }


    protected static function boot()
    {
        parent::boot();
    }

}
