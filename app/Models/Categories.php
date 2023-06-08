<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table      = 'categories';
    protected $primaryKey = 'id';
    protected $fillable   = ['name','image'];
    protected $hidden     = ['created_at', 'updated_at'];


    public function books(){
        return $this->hasMany(Book::class,'category_id');
    }


}
