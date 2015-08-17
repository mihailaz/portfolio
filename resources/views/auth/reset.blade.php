{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 15.08.15
 Time: 14:08
--}}

@extends('layout')

@section('title', 'Login')@endsection

@section('content')
	<div class="container">
		<div class="col-md-offset-4 col-md-4">

            @include('errors.form')

			<form class="form-horizontal" method="post" action="/password/reset">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">
                <h2>Please sign up</h2>

                <div class="form-group">
                    <label for="register-form-email" class="control-label">Email address</label>
                    <div class="controls">
                        <input type="email" id="register-form-email" name="email" class="form-control" placeholder="Email address" required autofocus value="{{ old('email') }}">
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
	                <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
				</div>
            </form>
		</div>
	</div>
@endsection