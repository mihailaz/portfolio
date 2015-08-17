{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 15.08.15
 Time: 13:06
--}}

@extends('layout')

@section('title', 'Login')@endsection

@section('content')
	<div class="container">
		<div class="col-md-offset-4 col-md-4">

            @include('errors.form')

			<form class="form-horizontal" method="post" action="/register">
                {!! csrf_field() !!}
                <h2>Please sign up</h2>

                <div class="form-group">
                    <label for="register-form-email" class="control-label">Email address</label>
                    <div class="controls">
                        <input type="email" id="register-form-email" name="email" class="form-control" placeholder="Email address" required autofocus value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="register-form-name" class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" id="register-form-name" name="name" class="form-control" placeholder="Name" required value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="register-form-phone" class="control-label">Phone</label>
                    <div class="controls">
                        <input type="text" id="register-form-phone" name="phone" class="form-control" placeholder="Phone" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="register-form-password" class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" id="register-form-password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="register-form-confirm-password" class="control-label">Confirm password</label>
                    <div class="controls">
                        <input type="password" id="register-form-confirm-password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                    </div>
                </div>

				<div class="form-group">
	                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
	                <a href="/login" class="btn btn-link btn-lg pull-right">Sign in</a>
				</div>
            </form>
		</div>
	</div>
@endsection