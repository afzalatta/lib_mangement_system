<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPasswordReset extends Model
{
    protected $table      = 'admin_password_resets';
    protected $fillable = [
        'email', 'token'
    ]; 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at'
    ];
}
