<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class LearningPath extends Model {
    protected $fillable = ['title','description','image','status'];
 
    public function courses() {
        return $this->belongsToMany(Course::class, 'learning_path_courses')
                    ->withPivot('order')
                    ->orderBy('learning_path_courses.order');
    }
}
