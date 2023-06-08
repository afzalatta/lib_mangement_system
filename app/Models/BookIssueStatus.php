<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssueStatus extends Model
{
    use HasFactory;

    protected $table      = 'book_issue_status';
    protected $primaryKey = 'id';
    protected $fillable   = ['status_name'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function status_issue(){
        return $this->hasMany(BookIssue::class,'issue_status_id');
    }
}
