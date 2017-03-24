<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'is_active', 'content'];



    public function replies(){

    	return $this->hasMany('App\CommentReply');
    }

    public function post(){

    	return $this->belongsTo('App\Post');
    }
}
