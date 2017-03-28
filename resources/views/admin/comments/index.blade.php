
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

    <h1 class="form-heading">Comments</h1>
    <div class="table-responsive">
        <table class="table table-hover vertical-align">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>Content</th>
                <th>Posted by</th>
                <th>Created</th>            
                <th></th>
            </tr>
            </thead>
            <tbody>

            @forelse($comments as $comment)

            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">{{$comment->post->title}}</a></td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->user->name}}</td>
                <td>{{$comment->created_at->diffForHumans()}}</td>
            </tr>
            @empty
                <tr><td>There are no comments.</td></tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection