@extends('layouts.blog-post')

@section('content')

<!-- Page Content -->
    <div class="container-fluid">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 card">
                <!-- Blog Post -->
                <!-- Title -->
                <div class="post-body">
                <h1 class="form-heading">{{$post->title}}</h1>
                <!-- Author -->
                <h4 class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </h4>
                <hr>
                <!-- Date/Time -->
                <p class="timePosted"><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
                <hr>
                <!-- Preview Image -->
                <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <img class="img-responsive" src="{{$post->photo ? $post->photo->path : 'http://placehold.it/900x300'}}" alt="No image" height="150">
                </div>
                </div>
                <hr>
                
                    <!-- Post Content -->
                    <p class="lead">{{$post->body}}</p>


                    <!-- Blog Comments -->
                    <!-- Comments Form -->
                    <div class="comments-area">
                        @if(Auth::check())
                        <div class="small-card">
                            <h4 class="reply-header">Leave a Comment</h4>

                            {!! Form::open(['method'=>'Post', 'action' => 'PostCommentsController@store', 'id'=>'commentForm'])!!}
                            <input type="hidden" name="post_id" value='{{$post->id}}'>
                            <div class="form-group">
                                {!! Form::textarea('content', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-comment" aria-hidden="true"></i> Comment', ['type'=>'submit', 'class'=>'form-button', 'id'=>'commentButton'])!!}
                            </div>
                            {!! Form::close()!!}
                            
                            
                        </div>
                        @else
                        <p><strong>Please log in to leave a comment.</strong></p>
                        @endif


                        <!-- Posted Comments -->
                        <div class="comments-box" id='commentsContainer'>
                         
                            @foreach($post->comments()->orderBy('created_at', 'DESC')->get() as $comment)
                            <!-- Comment -->
                            <div class="media small-card">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="{{$comment->user->photo ? $comment->user->photo->path : '/images/alternate.jpg'}}" alt="" height="50" width="50">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$comment->user->name}}
                                        <small>{{$comment->created_at->diffForHumans()}}</small>
                                    </h4>
                                    <p>{{$comment->content}}</p>
                                    <!--Replies -->
                                    <div id="repliesContainer">
                                    @if(count($comment->replies) > 0)
                                    @foreach($comment->replies as $reply)
                                    <div class="media">
                                        <a href="" class="pull-left">
                                            <img src="{{$comment->user->photo ? $comment->user->photo->path : '/images/alternate.jpg'}}" class="media-object img-circle" height="50" width="50">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->user->name}} <small>{{$reply->created_at->diffForHumans()}}</small></h4>
                                            {{$reply->content}}                                     
                                        </div>
                                    </div>                                   
                                    @endforeach
                                    @endif
                                    </div>
                                     {!! Form::open(['method'=>'Post', 'action'=>'CommentRepliesController@createReply','class'=>'replyForm'])!!}
                                     <div class="form-group">
                                    {!! Form::textarea('content', null, ['class'=>'form-control'])!!}
                                   
                                    {!! Form::button('<i class="fa fa-reply" aria-hidden="true"></i> Reply',['type'=>'submit', 'class'=>'form-button'])!!}
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                     </div>
                                    {!! Form::close()!!}
                                </div>
                            </div>
                            @endforeach


                        </div>{{--End Comments box --}}
                    </div>{{--End Comments area --}}
                </div>{{--End post-body--}}
            </div>

            <!-- Blog Sidebar -->
            <div class="col-md-3 col-md-offset-1 card-no-padding" id="post-sidebar">
                {{--<!-- Blog Search Well -->--}}
                    {{--<h4 class="form-heading">Blog Search</h4>--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" class="form-control">--}}
                        {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="button">--}}
                                {{--<span class="glyphicon glyphicon-search"></span>--}}
                        {{--</button>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                

                <!-- Blog Categories Well -->
                    <h4 class="form-heading">Blog Categories</h4>
                            <ul class="newestPostsList">
                               @if($categories)
                               @foreach($categories as $category)
                                    <li class="newestPost"><a href="{{route('category.posts', $category->id)}}">{{$category->name}}</a></li>
                               @endforeach
                               @endif
                            </ul>

                <!-- Most recent posts -->
                    <h4 class="form-heading">5 Newest posts</h4>
                    <ul class="newestPostsList">
                        @foreach($newestPosts as $post)
                        <li class="newestPost"><a href="{{route('home.post', $post->id)}}">{{$post->title}}</a></li>
                        @endforeach
                    </ul>
            </div> <!--End Blog Sidebar -->
        </div><!--End .row -->
    </div>

    <!-- End .container -->
    <script type="text/javascript">
    
    var url = "{{route('admin.comments.store')}}";

    </script>
@endsection