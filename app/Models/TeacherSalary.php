<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class TeacherSalary extends Model {
    protected $fillable = [
        'teacher_id','batch_id','amount','bonus','month',
        'payment_method','status','notes','paid_at'
    ];
    protected $casts = ['paid_at' => 'datetime'];
 
    public function teacher() { return $this->belongsTo(User::class, 'teacher_id'); }
    public function batch() { return $this->belongsTo(Batch::class); }
}
