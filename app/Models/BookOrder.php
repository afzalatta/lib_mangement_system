<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;

    protected $table      = 'book_orders';
    protected $primaryKey = 'id';
    protected $fillable   = ['student_id','address','city','payment','status','stripe_id','order_id'];
    protected $hidden     = ['created_at', 'updated_at'];


}
