@extends('layouts.blog-post')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 card">
			<div class="row">
				<div class="col-lg-4">
					<h3 class="form-heading">{{$currentUser->name}}</h3>
					<div class="col-lg-12">
						<div class="col-lg-8 col-lg-offset-2">
						 <img class="media-object img-responsive img-circle" src="{{$currentUser->photo ? $currentUser->photo->path : '/images/alternate.jpg'}}" alt="">
							<div class="form-group">
								@if($id == Auth::user()->id)
								<a href="/settings" class="form-button"><i class="fa fa-cog" aria-hidden="true"></i> Account settings</a>
								@endif
							</div>
						 </div>
					 </div>
				</div>
				<div class="col-lg-4 profileMidSection">
					<h3 class="form-heading">Post statistics</h3>
					<div class="col-lg-12">
						<div class="postStat"><span class="postStatText">Articles</span> <span class="postStatNumber">{{$articleCount}}</span></div>
					</div>
					<div class="col-lg-12">
						<div class="postStat"><span class="postStatText">Comments</span> <span class="postStatNumber">{{$commentsCount}}</span></div>
					</div>
					<div class="col-lg-12">
						<div class="postStat"><span class="postStatText">Replies</span> <span class="postStatNumber">{{$commentReplies}}</span></div>
					</div>
				</div>
				<div class="col-lg-4">
					<h3 class="form-heading">Articles</h3>
					<ul class="newestPostsList">
						@foreach($articles as $article)
							<li class="newestPost">
								<a href="{{route('home.post', $article->id)}}">{{$article->title}}</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection