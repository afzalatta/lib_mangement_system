<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    use HasFactory;

    
    protected $table      = 'book_issues';
    protected $primaryKey = 'id';
    protected $fillable   = ['name','student_id','book_id','return_date','issue_status_id'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function status_issue(){
        return $this->belongsTo(BookIssueStatus::class,'issue_status_id');
    }
}
