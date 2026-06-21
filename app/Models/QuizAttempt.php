<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class QuizAttempt extends Model {
    protected $fillable = [
        'quiz_id','student_id','obtained_marks','total_marks',
        'is_passed','started_at','submitted_at'
    ];
    protected $casts = ['started_at' => 'datetime', 'submitted_at' => 'datetime'];
 
    public function quiz() { return $this->belongsTo(Quiz::class); }
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
    public function answers() { return $this->hasMany(QuizAnswer::class, 'attempt_id'); }
}
