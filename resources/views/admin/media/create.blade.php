@extends('layouts.admin')

@section('styles')
	
@endsection

@section('content')

<div class="card col-lg-10 col-lg-offset-1">
    @if(Session::has('deleted'))
    <div class="message-card">{{session('deleted')}}</div>
    @endif

    @if(Session::has('created'))
    <div class="message-card">{{session('created')}}</div>
    @endif

    <h1 class="form-heading">Upload media</h1>
    {!! Form::open(['method'=>'Post', 'action'=>'AdminMediaController@store', 'files' => true, 'class' =>'dropzone'])!!}
    {!! Form::close()!!}
</div>


@endsection

@section('scripts')
	
@endsection