@extends('layouts.admin')

@section('content')
<div class="card col-lg-10 col-lg-offset-1">
    @if(Session::has('deleted'))
    <div class="message-card">{{session('deleted')}}</div>
    @endif

    @if(Session::has('updated'))
    <div class="message-card">{{session('updated')}}</div>
    @endif

    @if(Session::has('created'))
    <div class="message-card">{{session('created')}}</div>
    @endif

    <h1 class="form-heading">Posts</h1>
    <div class="table-responsive" id="posts_table">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Created</th>
                <th>Posted by</th>               
                <th></th>
            </tr>
            </thead>
            <tbody>

            @forelse($posts as $post)

            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->category->name}}</td>          
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->user->name}}</td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}"><i class="fa fa-pencil icons" aria-hidden="true"></i></a></td>
            </tr>
            @empty
                <tr><td>There are no posts.</td></tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection