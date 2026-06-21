<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Payment extends Model {
    protected $fillable = [
        'enrollment_id','student_id','coupon_id','original_amount',
        'discount_amount','paid_amount','payment_method','transaction_id',
        'payment_proof','status','approved_by','approved_at','rejection_reason','month'
    ];
    protected $casts = ['approved_at' => 'datetime'];
 
    public function enrollment() { return $this->belongsTo(Enrollment::class); }
    public function student() { return $this->belongsTo(User::class, 'student_id'); }
    public function coupon() { return $this->belongsTo(Coupon::class); }
    public function approvedBy() { return $this->belongsTo(User::class, 'approved_by'); }
}
