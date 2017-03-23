@extends('layouts.admin')

@section('content')
<div class="col-lg-5 col-lg-offset-3 col-md-12 card">
    @if(Session::has('deleted'))
    <div class="message-card">{{session('deleted')}}</div>
    @endif

    @if(Session::has('created'))
    <div class="message-card">{{session('created')}}</div>
    @endif

    <h1 class="form-heading">Categories</h1>
    <div class="table-responsive">
        <table class="table table-hover vertical-align">
            <thead>
            <tr>
                <th>ID</th>               
                <th>Category</th>
                <th>Created</th>
                <th></th>      
            </tr>
            </thead>
            <tbody>

            @forelse($categories as $category)

            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td>
                {!!Form::open(['method'=>'Delete', 'action'=>['AdminCategoriesController@destroy', $category->id], 'id'=>'deleteCategory'])!!}
                <a onclick='this.parentNode.submit()'><i class="fa fa-times-circle-o icons" aria-hidden="true"></i></a></td>
                {!!Form::close()!!}
            </tr>
            @empty
                <tr><td>There are no categories.</td></tr>
            @endforelse

            </tbody>
        </table>
    </div>{{-- Table end --}}
  
{!! Form::open(['method'=>'Post', 'action'=>'AdminCategoriesController@store'])!!}
<div class="form-group">

{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category name'])!!}

 @if ($errors->has('name'))
                <div class="error-message">{{$errors->first('name')}}</div>
            @endif
</div>
<div class="form-group">
<div class="row">
{!! Form::button('<i class="fa fa-plus-circle" aria-hidden="true"></i> Add category',['type'=>'submit', 'class'=>'form-button'])!!}
</div>
</div>
{!!Form::close()!!}

</div>{{-- Card end --}}

@endsection