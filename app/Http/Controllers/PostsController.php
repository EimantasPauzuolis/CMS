<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Post;

class PostsController extends Controller
{
    public function categoryPosts($id){
    	$category = Category::findOrFail($id);
    	$categories = Category::all();
    	$newestPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
    	return view('posts.category', compact('category', 'categories', 'newestPosts'));
    }
}
