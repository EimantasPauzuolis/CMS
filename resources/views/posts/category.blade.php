@extends('layouts.blog-post')

@section('content')

<!-- Page Content -->
    <div class="container-fluid">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12 card">
                <!-- Blog Post -->
                <!-- Title -->
                <div class="post-body">
                <h1 class="form-heading">Posts belonging to: {{$category->name}}</h1>
                <!-- Author -->
                @foreach($category->posts as $post)
               <div class="small-card">
                   <h3>{{$post->title}}</h3>
               </div>
               @endforeach
                
             
            </div>
                
            </div> <!--End Blog Sidebar -->
        </div><!--End .row -->
    </div>

@endsection
