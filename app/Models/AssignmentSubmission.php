<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class AssignmentSubmission extends Model {
    protected $fillable = [
        'assignment_id','student_id','description','file_path',
        'github_link','obtained_marks','feedback','status','submitted_at'
    ];
    protected $casts = ['submitted_at' => 'datetime'];
 
    public function assignment() { return $this->belongsTo(Assignment::class); }
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
}
