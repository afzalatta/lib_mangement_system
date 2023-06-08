<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table      = 'order_detail';
    protected $primaryKey = 'id';
    protected $fillable   = ['order_id','book','price','quantity'];
    protected $hidden     = ['created_at', 'updated_at'];
}
