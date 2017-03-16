@extends('layouts.admin')

@section('content')

<div class="card col-lg-10 col-lg-offset-1">
@if(Session::has('deleted'))
    <div class="message-card">{{session('deleted')}}</div>
    @endif
    <h1 class="form-heading">Users</h1>
    <div class="table-responsive" id="users_table">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @forelse($users as $user)

            <tr>
                <td>{{$user->id}}</td>

                <td><img src="{{$user->photo ? $user->photo->path : '/images/alternate.jpg'}}" alt="No image" height = '60' width="60"></td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                @if($user->is_active == 1)
                    <td><i class="fa fa-circle enabled" aria-hidden="true"></i></td>
                @else
                    <td><i class="fa fa-circle disabled" aria-hidden="true"></i></td>
                @endif
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td><a href="{{route('admin.users.edit', $user->id)}}"><i class="fa fa-pencil icons" aria-hidden="true"></i></a></td>
            </tr>
            @empty
                <tr><td>There are no users registered.</td></tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection