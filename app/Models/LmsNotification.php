<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class LmsNotification extends Model {
    protected $table = 'lms_notifications';
    protected $fillable = ['user_id','title','message','type','url','is_read','read_at'];
    protected $casts = ['read_at' => 'datetime'];
 
    public function user() { return $this->belongsTo(User::class); }
}
