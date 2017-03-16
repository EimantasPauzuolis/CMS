


@extends('layouts.admin')

@section('content')


    <div class="col-lg-5 col-lg-offset-3 col-md-12 card">
        <h1 class="form-heading">Create User</h1>
        {!! Form::open(['method'=> 'Post', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

        <div class="form-group">

            {!! Form::text('name', null, ['class' => 'form-control form-input', 'placeholder'=>'Name', 'id' => 'create_form']) !!}
            @if ($errors->has('name'))
                <div class="error-message">{{$errors->first('name')}}</div>
            @endif
        </div>

        <div class="form-group">

            {!! Form::text('email', null, ['class' => 'form-control form-input', 'placeholder'=>'Email']) !!}
            @if ($errors->has('email'))
                <div class="error-message">{{$errors->first('email')}}</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id',$roles, null, ['class' => 'form-control form-input']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Account status') !!}
            {!! Form::select('is_active', [1 => 'Active', 0=>'Inactive'], 0, ['class'=>'form-control form-input']) !!}
        </div>
        <div class="form-group">
            <label>
                <span id="upload-button">Upload profile image</span> <i class="fa fa-picture-o" aria-hidden="true"></i>
                {!! Form::file('photo_id',['class'=>'file-input-field']) !!}
            </label>
        </div>
        <div class="form-group">
            {!! Form::password('password',['class'=>'form-control form-input', 'placeholder'=>'Password']) !!}
            @if ($errors->has('password'))
                <div class="error-message">{{$errors->first('password')}}</div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::button('<i class="fa fa-plus-circle" aria-hidden="true"></i> Create user', ['type' =>'submit', 'class'=>'form-button col-sm-4 col-sm-offset-4']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection