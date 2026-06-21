<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class CourseReview extends Model {
    protected $fillable = ['course_id','student_id','rating','review','is_featured','is_approved'];
 
    public function course() { return $this->belongsTo(Course::class); }
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
}
