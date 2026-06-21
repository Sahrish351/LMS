<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Attendance extends Model {
    protected $fillable = ['batch_id','student_id','marked_by','date','status','remarks'];
    protected $casts = ['date' => 'date'];
 
    public function batch() { return $this->belongsTo(Batch::class); }
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
    public function markedBy() { return $this->belongsTo(User::class, 'marked_by'); }
}
