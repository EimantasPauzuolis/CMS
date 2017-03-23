@extends('layouts.admin')

@section('styles')
	
@endsection

@section('content')

<div class="col-lg-5 col-lg-offset-3 col-md-12 card">
    @if(Session::has('deleted'))
    <div class="message-card">{{session('deleted')}}</div>
    @endif

    @if(Session::has('created'))
    <div class="message-card">{{session('created')}}</div>
    @endif

    <h1 class="form-heading">Upload media</h1>
    <div class="row">
        <div class="col-lg-12">
            <i class="fa fa-file-image-o" aria-hidden="true"></i>
        </div>
    </div>
    {!! Form::open(['method'=>'Post', 'action'=>'AdminMediaController@store', 'files' => true, 'class' =>'dropzone'])!!}
    {!! Form::close()!!}
</div>


@endsection

@section('scripts')
	
@endsection