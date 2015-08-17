{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 15.08.15
 Time: 13:06
--}}

@extends('layout')

@section('title', 'Login')@endsection

@section('content')
	<div class="container">
		<div class="col-md-4 col-md-offset-4">

            @include('errors.form')

			<form class="form-signin" method="post" action="/login">
	            {!! csrf_field() !!}
	            <h2 class="form-signin-heading">Please sign in</h2>

	            <div class="form-group input-group">
	                <span class="input-group-addon">
	                    <span class="glyphicon glyphicon-user"></span>
	                </span>
	                <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus value="{{ old('email') }}">
	            </div>

	            <div class="form-group input-group">
	                <span class="input-group-addon">
	                    <span class="glyphicon glyphicon-lock"></span>
	                </span>
	                <input type="password" name="password" class="form-control" placeholder="Password" required>
	            </div>

	            <div class="form-group">
	                <div class="checkbox">
	                    <label>
	                        <input type="checkbox" value="1" name="remember" checked="checked"> Remember me
	                    </label>
	                </div>
	            </div>

	            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	            <a href="/password/email" class="btn btn-link pull-left">Restore password</a>
	            <a href="/register" class="btn btn-link pull-right">Sign up</a>
	            <div class="clearfix"></div>

	            <p class="text-center">Login with:</p>

	            <a href="/auth/vkontakte" class="btn btn-lg pull-left btn-vk">VK</a>
	            <a href="/auth/facebook" class="btn btn-lg pull-right btn-fb">Facebook</a>
	        </form>
		</div>
	</div>
@endsection