<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\CommentReply;
use App\User;
class UserController extends Controller
{
    public function currentUserProfile(){
    	$currentUser = Auth::user();
    	$id = $currentUser->id;
    	$articles = Post::whereUserId($currentUser->id)->get();
    	$articleCount = Post::whereUserId($currentUser->id)->count();
    	$commentsCount = Comment::whereUserId($currentUser->id)->count();
    	$commentReplies = CommentReply::whereUserId($currentUser->id)->count();
    	return view('user.index', compact('currentUser', 'articles', 'articleCount', 'commentsCount', 'commentReplies', 'id'));
    }

    public function userProfile($id){
        $currentUser = User::findOrFail($id);
        $articles = Post::whereUserId($currentUser->id)->get();
        $articleCount = Post::whereUserId($currentUser->id)->count();
        $commentsCount = Comment::whereUserId($currentUser->id)->count();
        $commentReplies = CommentReply::whereUserId($currentUser->id)->count();
        return view('user.index', compact('currentUser', 'articles', 'articleCount', 'commentsCount', 'commentReplies', 'id'));
    }
}
