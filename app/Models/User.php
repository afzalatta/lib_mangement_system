<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table      = 'users';
    protected $fillable   = [
        'name', 'email', 'password', 'user_phone', 'user_photo', 'user_address', 'user_address','user_address'
    ];
}
