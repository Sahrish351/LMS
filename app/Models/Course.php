<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Course extends Model {
    use SoftDeletes;
    protected $fillable = [
        'title','slug','short_description','description','category_id',
        'created_by','thumbnail','intro_video','price','discount_price',
        'duration','level','language','max_students','is_featured',
        'certificate_available','status'
    ];
 
    public function category() { return $this->belongsTo(Category::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
    public function modules() { return $this->hasMany(Module::class)->orderBy('order'); }
    public function batches() { return $this->hasMany(Batch::class); }
    public function enrollments() { return $this->hasMany(Enrollment::class); }
    public function reviews() { return $this->hasMany(CourseReview::class); }
    public function certificates() { return $this->hasMany(Certificate::class); }
    public function questionBanks() { return $this->hasMany(QuestionBank::class); }
 
    public function averageRating() {
        return $this->reviews()->where('is_approved', true)->avg('rating') ?? 0;
    }
    public function totalStudents() {
        return $this->enrollments()->where('status', 'approved')->count();
    }
}
