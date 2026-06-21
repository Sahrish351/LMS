<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Assignment extends Model {
    protected $fillable = [
        'batch_id','created_by','title','description',
        'attachment','due_date','total_marks','status'
    ];
    protected $casts = ['due_date' => 'datetime'];
 
    public function batch() { return $this->belongsTo(Batch::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
    public function submissions() { return $this->hasMany(AssignmentSubmission::class); }
 
    public function isOverdue() { return now()->gt($this->due_date); }
}
