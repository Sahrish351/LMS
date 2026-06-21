<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class QuizAnswer extends Model {
    protected $fillable = ['attempt_id','question_id','selected_answer','is_correct'];
 
    public function attempt() { return $this->belongsTo(QuizAttempt::class); }
    public function question() { return $this->belongsTo(QuestionBank::class, 'question_id'); }
}
