{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 15.08.15
 Time: 14:06
--}}

@extends('layout')

@section('title', 'Restore password')@endsection

@section('content')
	<div class="container">
		<div class="col-md-4 col-md-offset-4">

            @include('errors.form')

			<form method="post" action="/password/email">
			    {!! csrf_field() !!}
	            <h2>Restore password</h2>

                <div class="form-group">
                    <label for="register-form-email" class="control-label">Email address</label>
                    <div class="controls">
                        <input type="email" id="register-form-email" name="email" class="form-control" placeholder="Email address" required autofocus value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
		            <button class="btn btn-lg btn-primary btn-block" type="submit">Send Password Reset Link</button>
		            <a href="/login" class="btn btn-link btn-lg pull-left">Sign in</a>
                </div>
	        </form>
		</div>
	</div>
@endsection