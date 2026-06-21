<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Module extends Model {
    protected $fillable = ['course_id','title','description','order','status'];
 
    public function course() { return $this->belongsTo(Course::class); }
    public function lessons() { return $this->hasMany(Lesson::class)->orderBy('order'); }
}
