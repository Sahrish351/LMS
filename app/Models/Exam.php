<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Exam extends Model {
    protected $fillable = [
        'batch_id','created_by','title','instructions','time_limit_minutes',
        'total_marks','passing_marks','shuffle_questions','auto_submit','exam_date','status'
    ];
    protected $casts = ['exam_date' => 'datetime'];
 
    public function batch() { return $this->belongsTo(Batch::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
    public function questions() { return $this->hasMany(ExamQuestion::class); }
    public function attempts() { return $this->hasMany(ExamAttempt::class); }
}
