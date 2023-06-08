<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    use HasFactory;
    protected $table      = 'books_status';
    protected $primaryKey = 'id';
    protected $fillable   = ['status_name'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function status_book(){
        return $this->hasMany(Book::class,'status');
    }

}
