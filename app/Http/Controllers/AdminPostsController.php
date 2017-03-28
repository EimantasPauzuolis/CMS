<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\Http\Requests;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::lists('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }
        Post::create($input);
        Session::flash('created', 'The post has been created');

        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('name', 'id');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $input = $request->all();
        if($file = $request->file('photo_id')){
            //Checks if the user already has a relation to an image and deletes both the image on the server and the old relation in the table
            if($post->photo){
                Photo::destroy([$post->photo->id]);
                $oldPath = '/public' . $post->photo->path;
                Storage::delete($oldPath);
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;

        }

        $user = Auth::user();
        $input['user_id']=$user->id;
        $post->update($input);
        Session::flash('updated', 'The post has been updated');
        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->photo){
            $oldPath = '/public' . $post->photo->path;
            Storage::delete($oldPath);
        }
        $post->delete();
        Session::flash('deleted', 'The post has been deleted');

        return redirect('/admin/posts');
    }

    public function post($id){

        $categories = Category::all();
        $post = Post::findOrFail($id);
        $newestPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        // return $comments;
        return view('post', compact(['post', 'categories', 'newestPosts']));
    }
}
