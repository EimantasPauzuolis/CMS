@extends('layouts.blog-post')

@section('content')

<!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 card">

                <!-- Blog Post -->

                <!-- Title -->
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

                <img class="img-responsive" src="{{$post->photo ? $post->photo->path : 'http://placehold.it/900x300'}}" alt="No image" height = "150">
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	{{$post->body}}
                </p>

               

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="small-card">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="form-button">Submit</button>
                        </div>
                    </form>
                </div>

              

                <!-- Posted Comments -->
                <div class="small-card">
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
              
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
                </div>{{-- Comments area --}}
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3 col-md-offset-1 card">

                <!-- Blog Search Well -->
                
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                

                <!-- Blog Categories Well -->
                
                    <h4>Blog Categories</h4>
                
                            <ul class="list-unstyled">
                               @if($categories)
                               @foreach($categories as $category)
                                    <li>{{$category->name}}</li>
                               @endforeach
                               @endif
                            </ul>
                    
                    <!-- /.row -->
                

                <!-- Side Widget Well -->
                
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
              

            </div>

        </div>
        <!-- /.row -->

       

       

    </div>
    <!-- /.container -->

@endsection