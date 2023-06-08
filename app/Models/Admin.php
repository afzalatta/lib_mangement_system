<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Admin extends Model
{

    protected $table      = 'admins';
    protected $primaryKey = 'id';
    protected $fillable   = ['admin_email'];
    protected $hidden     = ['admin_password', 'created_at', 'updated_at'];

}
