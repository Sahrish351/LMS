<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Lesson extends Model {
    protected $fillable = [
        'module_id','title','type','content','video_url',
        'file_path','duration_minutes','is_free_preview','order','status'
    ];
 
    public function module() { return $this->belongsTo(Module::class); }
    public function resources() { return $this->hasMany(LessonResource::class); }
    public function progress() { return $this->hasMany(Progress::class); }
}