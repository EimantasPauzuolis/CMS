@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-3 col-md-12 card">
            <h1 class="form-heading">Login</h1>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">

                            
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

                                @if ($errors->has('email'))                                    
                                        <div class="error-message">{{ $errors->first('email') }}</div>
                                @endif
                            
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                                     @if ($errors->has('password'))                                    
                                        <div class="error-message">{{ $errors->first('password') }}</div>
                                     @endif                        
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                                <button type="submit" class="form-button col-sm-4 col-sm-offset-4">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <div class="row">
                                <a class=" col-sm-12 btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                </div>
                        </div>
                    </form>
        
        </div>
    </div>
</div>
@endsection
