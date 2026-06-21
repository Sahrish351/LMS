<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class ExamAttempt extends Model {
    protected $fillable = [
        'exam_id','student_id','obtained_marks','is_passed',
        'grade','answers','started_at','submitted_at'
    ];
    protected $casts = [
        'answers' => 'array',
        'started_at' => 'datetime',
        'submitted_at' => 'datetime'
    ];
 
    public function exam() { return $this->belongsTo(Exam::class); }
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
}
