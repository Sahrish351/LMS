<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Announcement extends Model {
    protected $fillable = [
        'created_by','title','body','type','course_id','batch_id','scheduled_at','status'
    ];
    protected $casts = ['scheduled_at' => 'datetime'];
 
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
    public function course() { return $this->belongsTo(Course::class); }
    public function batch() { return $this->belongsTo(Batch::class); }
}
