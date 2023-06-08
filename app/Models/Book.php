<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table      = 'books';
    protected $primaryKey = 'id';
    protected $fillable   = ['name','category_id','publisher_id','author_id','status','image','price','quantity','description'];
    protected $hidden     = ['created_at', 'updated_at'];
    protected $appends    = ['stock_quantity_available '];

    public function getStockQuantityAvailableAttribute(){
        if($this->attributes['quantity'] > 0)
        {
            return "Yes";
        }
       else
        {
            return "No";
        }
    }

    public function status_book(){
        return $this->belongsTo(BookStatus::class,'status');
    }

    public function category(){
        return $this->belongsTo(Categories::class);
    }


    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }


    public function author(){
        return $this->belongsTo(Author::class);
    }

}
