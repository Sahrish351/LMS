<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class DiscussionThread extends Model {
    protected $fillable = [
        'course_id','batch_id','lesson_id','user_id',
        'title','body','is_pinned','is_solved','views'
    ];
 
    public function user() { return $this->belongsTo(User::class); }
    public function course() { return $this->belongsTo(Course::class); }
    public function batch() { return $this->belongsTo(Batch::class); }
    public function lesson() { return $this->belongsTo(Lesson::class); }
    public function replies() { return $this->hasMany(DiscussionReply::class, 'thread_id'); }
}
