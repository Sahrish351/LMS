<?php
 
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class User extends Authenticatable {
    use HasFactory, Notifiable;
 
    protected $fillable = [
        'name','email','password','role_id','phone','cnic',
        'profile_picture','status','address','date_of_birth',
        'gender','bio','referral_code','referred_by'
    ];
 
    protected $hidden = ['password','remember_token'];
 
    // Relations
    public function role() { return $this->belongsTo(Role::class); }
    public function enrollments() { return $this->hasMany(Enrollment::class, 'student_id'); }
    public function batches() { return $this->hasMany(Batch::class, 'teacher_id'); }
    public function payments() { return $this->hasMany(Payment::class, 'student_id'); }
    public function submissions() { return $this->hasMany(AssignmentSubmission::class, 'student_id'); }
    public function attendances() { return $this->hasMany(Attendance::class, 'student_id'); }
    public function certificates() { return $this->hasMany(Certificate::class, 'student_id'); }
    public function tickets() { return $this->hasMany(SupportTicket::class); }
    public function notifications() { return $this->hasMany(LmsNotification::class); }
    public function progress() { return $this->hasMany(Progress::class, 'student_id'); }
    public function reviews() { return $this->hasMany(CourseReview::class, 'student_id'); }
    public function salaries() { return $this->hasMany(TeacherSalary::class, 'teacher_id'); }
    public function courses() { return $this->hasMany(Course::class, 'created_by'); }
 
    // Role Helpers
    public function isAdmin() { return $this->role->name === 'admin' || $this->role->name === 'super_admin'; }
    public function isTeacher() { return $this->role->name === 'teacher'; }
    public function isStudent() { return $this->role->name === 'student'; }
    public function isSuperAdmin() { return $this->role->name === 'super_admin'; }
}
 