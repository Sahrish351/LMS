<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class QuestionBank extends Model {
    protected $fillable = [
        'course_id','created_by','question','type',
        'option_a','option_b','option_c','option_d',
        'correct_answer','explanation','difficulty','topic','marks'
    ];
 
    public function course() { return $this->belongsTo(Course::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
    public function quizQuestions() { return $this->hasMany(QuizQuestion::class, 'question_id'); }
    public function examQuestions() { return $this->hasMany(ExamQuestion::class, 'question_id'); }
}
