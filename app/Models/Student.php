<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;
     use HasFactory; 

     protected $table      = 'students';
     protected $primaryKey = 'id';
     protected $fillable   = ['name', 'email', 'password', 'age', 'address', 'gender', 'phone','class'];
     protected $hidden     = ['created_at', 'updated_at'];
 
}
