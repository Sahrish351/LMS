<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Coupon extends Model {
    protected $fillable = [
        'code','description','discount_type','discount_value',
        'min_amount','usage_limit','used_count','is_active','expires_at'
    ];
    protected $casts = ['expires_at' => 'date'];
 
    public function payments() { return $this->hasMany(Payment::class); }
 
    public function isValid() {
        if (!$this->is_active) return false;
        if ($this->expires_at && $this->expires_at->isPast()) return false;
        if ($this->usage_limit && $this->used_count >= $this->usage_limit) return false;
        return true;
    }
 
    public function calculateDiscount($amount) {
        if ($this->discount_type === 'percentage') {
            return $amount * ($this->discount_value / 100);
        }
        return min($this->discount_value, $amount);
    }
}
 
