<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Batch extends Model {
    use SoftDeletes;
    protected $fillable = [
        'course_id','teacher_id','name','start_date','end_date',
        'class_time','class_days','max_students','status','notes'
    ];
 
    public function course() { return $this->belongsTo(Course::class); }
    public function teacher() { return $this->belongsTo(User::class, 'teacher_id'); }
    public function enrollments() { return $this->hasMany(Enrollment::class); }
    public function assignments() { return $this->hasMany(Assignment::class); }
    public function quizzes() { return $this->hasMany(Quiz::class); }
    public function exams() { return $this->hasMany(Exam::class); }
    public function attendances() { return $this->hasMany(Attendance::class); }
    public function liveClasses() { return $this->hasMany(LiveClass::class); }
    public function certificates() { return $this->hasMany(Certificate::class); }
    public function announcements() { return $this->hasMany(Announcement::class); }
 
    public function students() {
        return $this->hasManyThrough(User::class, Enrollment::class, 'batch_id', 'id', 'id', 'student_id')
                    ->where('enrollments.status', 'approved');
    }
    public function totalSeatsLeft() {
        return $this->max_students - $this->enrollments()->where('status','approved')->count();
    }
}
 
