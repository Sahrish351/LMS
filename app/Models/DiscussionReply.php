<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class DiscussionReply extends Model {
    protected $fillable = ['thread_id','user_id','parent_id','body','is_accepted_answer'];
 
    public function thread() { return $this->belongsTo(DiscussionThread::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function parent() { return $this->belongsTo(DiscussionReply::class, 'parent_id'); }
    public function children() { return $this->hasMany(DiscussionReply::class, 'parent_id'); }
}
