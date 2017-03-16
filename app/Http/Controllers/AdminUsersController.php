<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Role;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name','id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect('/admin/users');
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

        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){
            //Checks if the user already has a relation to an image and deletes both the image on the server and the old relation in the table
            if($user->photo){
                Photo::destroy([$user->photo->id]);
                $oldPath = '/public' . $user->photo->path;
                Storage::delete($oldPath);
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;
        }

        $user->update($input);
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //Photo::destroy($user->photo->id);

        //$user->delete();

        Session::flash('deleted', 'The user has been deleted');

        return redirect('admin/users');
        
    }
}

