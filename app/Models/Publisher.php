<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $table      = 'publishers';
    protected $primaryKey = 'id';
    protected $fillable   = ['name'];
    protected $hidden     = ['created_at', 'updated_at'];


    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
