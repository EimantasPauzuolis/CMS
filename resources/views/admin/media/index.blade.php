@extends('layouts.admin')

@section('content')

<div class="card col-lg-10 col-lg-offset-1">
    @if(Session::has('deleted'))
    <div class="message-card">{{session('deleted')}}</div>
    @endif

    @if(Session::has('created'))
    <div class="message-card">{{session('created')}}</div>
    @endif
    @if($photos)
    <h1 class="form-heading">Media</h1>
    {{ $photos->render()}}
    <div class="table-responsive">
        <table class="table table-hover vertical-align">
            <thead>
            <tr>
                <th>ID</th>               
                <th>Image</th>
                <th>Created</th>
                <th></th>      
            </tr>
            </thead>
            <tbody>

            @forelse($photos as $photo)

            <tr>
                <td>{{$photo->id}}</td>
                <td><img src="{{$photo->path}}" height="100px"></td>
                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>
                {!!Form::open(['method'=>'Delete', 'action'=>['AdminMediaController@destroy', $photo->id]])!!}
                <a onclick='this.parentNode.submit()'><i class="fa fa-times-circle-o icons" aria-hidden="true"></i></a></td>
                {!!Form::close()!!}
            </tr>
            @empty
                <tr><td>There is no media.</td></tr>
            @endforelse

            </tbody>           
        </table>
        @if(count($photos) > 7)
        {{ $photos->render()}}
        @endif
    </div>
    @endif
  
{{-- {!! Form::open(['method'=>'Post', 'action'=>'AdminCategoriesController@store'])!!}
<div class="form-group">
{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category name'])!!}
 @if ($errors->has('name'))
                <div class="error-message">{{$errors->first('name')}}</div>
            @endif
</div>
<div class="form-group">
{!! Form::button('<i class="fa fa-plus-circle" aria-hidden="true"></i> Add category',['type'=>'submit', 'class'=>'form-button col-sm-4 col-sm-offset-4'])!!}
</div>
{!!Form::close()!!} --}}
</div>



@endsection