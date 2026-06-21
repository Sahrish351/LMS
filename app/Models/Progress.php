<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Progress extends Model {
    protected $fillable = [
        'student_id','lesson_id','enrollment_id',
        'is_completed','watch_duration_seconds','completed_at'
    ];
    protected $casts = ['completed_at' => 'datetime'];
 
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
    public function lesson() { return $this->belongsTo(Lesson::class); }
    public function enrollment() { return $this->belongsTo(Enrollment::class); }
}
