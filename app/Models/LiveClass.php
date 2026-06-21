<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class LiveClass extends Model {
    protected $fillable = [
        'batch_id','teacher_id','title','description','platform',
        'meeting_link','meeting_id','meeting_password','scheduled_at',
        'duration_minutes','recording_link','status'
    ];
    protected $casts = ['scheduled_at' => 'datetime'];
 
    public function batch() { return $this->belongsTo(Batch::class); }
    public function teacher() { return $this->belongsTo(User::class, 'teacher_id'); }
}
