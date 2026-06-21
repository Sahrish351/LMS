<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class QuizQuestion extends Model {
    protected $fillable = ['quiz_id','question_id','order','marks'];
 
    public function quiz() { return $this->belongsTo(Quiz::class); }
    public function question() { return $this->belongsTo(QuestionBank::class, 'question_id'); }
}
