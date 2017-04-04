<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

use App\Http\Requests;

class CategoriesController extends Controller
{
    public function getCategory($id){

    	$category = Category::findOrFail($id);
    	return view('posts.category', compact('category'));

	}
}