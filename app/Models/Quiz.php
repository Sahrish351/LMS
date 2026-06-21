<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Quiz extends Model {
    protected $fillable = [
        'batch_id','lesson_id','created_by','title','instructions',
        'time_limit_minutes','total_marks','passing_marks',
        'attempts_allowed','shuffle_questions','available_from','available_to','status'
    ];
    protected $casts = ['available_from' => 'datetime', 'available_to' => 'datetime'];
 
    public function batch() { return $this->belongsTo(Batch::class); }
    public function lesson() { return $this->belongsTo(Lesson::class); }
    public function questions() { return $this->hasMany(QuizQuestion::class); }
    public function attempts() { return $this->hasMany(QuizAttempt::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
}
