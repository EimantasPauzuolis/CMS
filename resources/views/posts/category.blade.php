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
                <h1 class="form-heading">Posts belonging to: {{$category->name}}</h1>
                <!-- Author -->
          
                @forelse($category->posts as $post)
               <div class="small-card">
                   <h3><a href="{{route('home.post', $post->id)}}">{{$post->title}}</a></h3>
                   
               </div>
                @empty
                <p>There are no posts in this category</p>

               @endforelse
          
                
             
            </div>
                
            </div> <!--End Blog Content-->
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

@endsection
