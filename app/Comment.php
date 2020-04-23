<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=['post_id','body','author','email','is_active','photo'];
    public function replies(){
        return $this->hasMany('App\CommentReply');
    }
}
