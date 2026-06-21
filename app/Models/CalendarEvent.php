<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class CalendarEvent extends Model {
    protected $fillable = [
        'title','description','start_date','end_date','color',
        'type','batch_id','course_id','created_by','is_global'
    ];
    protected $casts = ['start_date' => 'datetime', 'end_date' => 'datetime'];
 
    public function batch() { return $this->belongsTo(Batch::class); }
    public function course() { return $this->belongsTo(Course::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
}
