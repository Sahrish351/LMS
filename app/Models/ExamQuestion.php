<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class ExamQuestion extends Model {
    protected $fillable = ['exam_id','question_id','marks','order'];
 
    public function exam() { return $this->belongsTo(Exam::class); }
    public function question() { return $this->belongsTo(QuestionBank::class, 'question_id'); }
}
