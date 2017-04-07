<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['user_id', 'comment_id', 'is_active', 'content'];


    public function comment(){

    	return $this->belongsTo('App\Comment');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
