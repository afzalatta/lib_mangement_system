<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table      = 'orders';
    protected $primaryKey = 'id';
    protected $fillable   = ['coup_id', 'user_id', 'brand_id', 'status_id', 'coup_name', 'coup_price', 
                                'coup_qty', 'brand_name', 'brand_address','distribute','print_it',
                                'pickup_coupon','delivery_address','payment','set_expiry_date','expiry_date',
                                    'delivery_charges','printing_cost'];
                                
    protected $hidden     = ['created_at', 'updated_at'];
    protected $appends    = ['added_date_format'];

    
    public function getAddedDateFormatAttribute()
    {
        return date('d/m/y', strtotime($this->attributes['created_at']));
    }

    public function coupon_orders(){
        return $this->belongsTo(Coupon::class,'coup_id');
    }

    public function user_orders(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function brand_orders(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function status_orders(){
        return $this->belongsTo(OrderStatus::class,'status_id');
    }

 

    protected static function boot()
    {
        parent::boot();
    }

}
