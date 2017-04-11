<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\CommentReply;
use App\User;
use Hash;
use Illuminate\Support\Facades\Session;
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

    public function userProfileSettings(){
        return view('user.settings');
    }

    public function changePassword(PasswordChangeRequest $request){
        $user = Auth::user();
        
            if(Hash::check($request->oldPassword, $user->password)){      
               
                $user->password = Hash::make($request->newPassword);
                $user->save();
                Session::flash('updatedPassword', 'Your password has been updated');
                
            }else{
                Session::flash('wrongPassword', 'Your old password was incorrect');
            }

            return back();
        
    }

    public function changeEmail(Request $request){
        $this->validate($request,[
            'newEmail' => 'required'
        ]);

        
    }
}
