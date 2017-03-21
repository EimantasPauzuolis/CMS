<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    public function index(){

   		$photos = Photo::simplePaginate(10);

   		return view('admin.media.index', compact('photos'));
    }

    public function create(){
    	return view('admin.media.create');
    }

    public function store(Request $request){

    	$file = $request->file('file');

    	$name = time() . $file->getClientOriginalName();

    	$file->move('images', $name);

    	Photo::create(['path'=>$name]);

    	return redirect('/admin/media');

    }

    public function destroy($id){

    	$photo = Photo::findOrFail($id);
    	if($photo){
    	$oldPath = $photo->path;
    	Storage::delete($oldPath);
    	$photo->delete();
    	Session::flash('deleted', 'The media file has been deleted');
    	}
    	return redirect('/admin/media');
    }
}
