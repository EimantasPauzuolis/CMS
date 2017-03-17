@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-lg-5 col-lg-offset-3 col-md-12 card">

                <h1 class="form-heading">Register</h1>
                
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                     <div class="error-message">{{ $errors->first('name') }}</div>
                                @endif
                            
                        </div>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}">

                               @if ($errors->has('email'))
                                    <div class="error-message">{{$errors->first('email')}}</div>
                                @endif
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password">

                                @if ($errors->has('password'))
                                    <div class="error-message">{{$errors->first('password')}}</div>
                                @endif

                        </div>

                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <div class="error-message">{{$errors->first('password_confirmation')}}</div>
                                @endif                             
                            
                        </div>

                        <div class="form-group">
                                <button type="submit" class="form-button col-sm-4 col-sm-offset-4">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                        </div>
                    </form>
            

        </div>
    </div>
</div>
@endsection
