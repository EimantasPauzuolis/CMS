@extends('layouts.admin')

@section('content')
<div class="col-lg-5 col-lg-offset-3 col-md-12 card">
        <h1 class="form-heading">Add categories</h1>
{!! Form::open(['method'=>'Post', 'action'=>'AdminCategoriesController@store'])!!}
{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category name'])!!}
{!!	Form::button('<i class="fa fa-plus-circle" aria-hidden="true"></i> Add category',['type'=>'submit', 'class'=>'form-button col-sm-4 col-sm-offset-4'])!!}
{!!Form::close()!!}
</div>
@endsection