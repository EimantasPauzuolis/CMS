@extends('layouts.blog-post')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 card">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-1">
					<h3 class="form-heading">{{Auth::user()->name}}</h3>
					<div class="col-lg-12">
						<ul class="newestPostsList" id="settings">
							<a href="#"><li class="newestPost" id='changePasswordToggle'>Change password</li></a>
							<a href="#"><li class="newestPost" id="changeEmailToggle">Change email</li></a>
							<a href="#"><li class="newestPost" id="changeDetailsToggle">Edit personal details</li></a>	
						</ul>
					</div>
				</div>
				<div class="col-lg-5 col-lg-offset-1">
								@if(Session::has('updatedPassword'))
    								<div class="message-card">{{session('updatedPassword')}}</div>
    							@endif
    							@if(Session::has('wrongPassword'))
    								<div class="message-card">{{session('wrongPassword')}}</div>
    							@endif
    				<div>
					<div id="changePassword">
						<h3 class="form-heading">Change Password</h3>
							<div class="col-lg-12">	
								{!! Form::open(['method'=> 'POST', 'action'=>'UserController@changePassword'])!!}
								<div class="form-group">
									{!! Form::password('oldPassword',['class'=>'form-control form-input', 'placeholder'=>'Old password']) !!}
								</div>

								@if ($errors->has('oldPassword'))
                					<div class="error-message">{{$errors->first('oldPassword')}}</div>
           						@endif

								<div class="form-group">
									{!! Form::password('newPassword',['class'=>'form-control form-input', 'placeholder'=>'New password']) !!}
								</div>

								@if ($errors->has('newPassword'))
                					<div class="error-message">{{$errors->first('newPassword')}}</div>
           						@endif

								<div class="form-group">
									{!! Form::password('newPasswordConfirm',['class'=>'form-control form-input', 'placeholder'=>'Confirm new password']) !!}
								</div>

								@if ($errors->has('newPasswordConfirm'))
                					<div class="error-message">{{$errors->first('newPasswordConfirm')}}</div>
           						@endif

								<div class="form-group">
            					{!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Change password', ['type' =>'submit', 'class'=>'form-button col-sm-4 col-sm-offset-4']) !!}
        						</div>
								{!! Form::close()!!}
							</div>
					</div>
					<div id="changeEmail">
						<h3 class="form-heading">Change email</h3>
							<div class="col-lg-12">	
								{!! Form::open(['method'=> 'POST', 'action'=>'UserController@changeEmail'])!!}
								<div class="form-group">
									{!! Form::text('oldEmail', Auth::user()->email, ['class'=>'form-control form-input', 'disabled'])!!}
								</div>
								<div class="form-group">
									{!! Form::text('newEmail', null, ['class'=> 'form-control form-input', 'placeholder'=> 'New email address'])!!}
								</div>
								<div class="form-group">
            					{!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Change email', ['type' =>'submit', 'class'=>'form-button col-sm-4 col-sm-offset-4']) !!}
        						</div>
								{!! Form::close()!!}
							</div>
					</div>

					<div id="changeDetails">
						<h3 class="form-heading">Change details</h3>
							<div class="col-lg-12">	

							</div>
					</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

@endsection