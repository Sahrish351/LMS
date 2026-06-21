<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Certificate extends Model {
    protected $fillable = [
        'student_id','course_id','batch_id','certificate_number',
        'certificate_file','issued_date','final_score','grade','is_verified'
    ];
    protected $casts = ['issued_date' => 'date'];
 
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
    public function course() { return $this->belongsTo(Course::class); }
    public function batch() { return $this->belongsTo(Batch::class); }
}
