<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class TicketReply extends Model {
    protected $fillable = ['ticket_id','user_id','message','attachment','is_staff_reply'];
 
    public function ticket() { return $this->belongsTo(SupportTicket::class); }
    public function user() { return $this->belongsTo(User::class); }
}
