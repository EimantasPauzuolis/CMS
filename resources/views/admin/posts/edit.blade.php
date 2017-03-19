@extends('layouts.admin')

@section('content')
    <div class="col-lg-5 col-lg-offset-3 col-md-12 card">
        <h1 class="form-heading">Edit Post</h1>
        {!! Form::model($post, ['method'=> 'Patch', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
        <img src="{{$post->photo ? $post->photo->path : '/images/alternatePost.jpg'}}" class="img-responsive img-rounded profile-img">
        <div class="form-group">

            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Title']) !!}
            @if ($errors->has('title'))
                <div class="error-message">{{$errors->first('title')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control form-input']) !!}
            @if ($errors->has('email'))php
                <div class="error-message">{{$errors->first('email')}}</div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder'=>'Enter your post', 'rows' => 4]) !!}
            @if ($errors->has('body'))
                <div class="error-message">{{$errors->first('body')}}</div>
            @endif
        </div>
        <div class="form-group">
            <label>
                <span id="upload-button">Upload post image</span> <i class="fa fa-picture-o" aria-hidden="true"></i>
                {!! Form::file('photo_id',['class'=>'file-input-field']) !!}
            </label>
        </div>
        <div class="form-group">
            {!! Form::button('<i class="fa fa-plus-circle" aria-hidden="true"></i> Edit post', ['type' =>'submit', 'class'=>'form-button col-sm-4 col-sm-offset-4']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection