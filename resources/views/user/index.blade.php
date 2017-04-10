@extends('layouts.blog-post')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 card">
			<div class="row">
				<div class="col-lg-4">
					<h3 class="form-heading">{{$currentUser->name}}</h3>
					<div class="col-lg-12">
						<div class="col-lg-8 col-lg-offset-2">
						 <img class="media-object img-responsive img-circle" src="{{$currentUser->photo ? $currentUser->photo->path : '/images/alternate.jpg'}}" alt="">
						 </div>
					 </div>
				</div>
				<div class="col-lg-4">
					<h3 class="form-heading">Post statistics</h3>
					<div class="col-lg-12"><h2 class="form-heading">Articles: {{$articleCount}}</h2></div>
					<div class="col-lg-12"><h2 class="form-heading">Comments: {{$commentsCount}}</h2></div>
					<div class="col-lg-12"><h2 class="form-heading">Replies: {{$commentReplies}}</h2></div>
				</div>
				<div class="col-lg-4">
					<h3 class="form-heading">Articles</h3>
					<ul class="newestPostsList">
						@foreach($articles as $article)
							<li class="newestPost">{{$article->title}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection