<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Enrollment extends Model {
    protected $fillable = [
        'student_id','course_id','batch_id','status',
        'enrolled_at','completed_at','progress_percentage'
    ];
    protected $casts = ['enrolled_at' => 'datetime', 'completed_at' => 'datetime'];
 
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
    public function course() { return $this->belongsTo(Course::class); }
    public function batch() { return $this->belongsTo(Batch::class); }
    public function payment() { return $this->hasOne(Payment::class); }
}
