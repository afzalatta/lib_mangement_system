<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table      = 'settings';
    protected $primaryKey = 'id';
    protected $fillable   = ['key', 'value'];
    protected $hidden     = ['created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
    }

}
