{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 17.08.15
 Time: 16:12
--}}

@extends('layout')

@section('title', 'Profile')@endsection

@section('content')

    @include('breadcrumbs', [
        'list' => [[
            'title' => 'Home',
            'url' => route('home'),
	    ],[
	        'title' => 'Profile'
	    ]]
    ])
	<div class="container">
		<div class="col-md-offset-4 col-md-4">
            <h2>Profile</h2>

            @include('errors.form')

            {!! Form::model($user, ['url' => '/profile', 'method' => 'put', 'class' => 'form-horizontal', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('name', null, ['required' => 'required', 'autofocus' => 'autofocus', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::email('email', null, ['required' => 'required', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
				<div class="form-group">
					{!! Form::label('image', 'Photo', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::file('image', ['class' => 'form-control']) !!}
					</div>
				</div>
				@if($user->image)
					<div class="form-group">
                        <a href="{{ $user->image }}" data-toggle="lightbox">{{ $user->image }}</a>
					</div>
                @endif
				<div class="form-group">
					{!! Form::label('password', 'New Password', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::password('password', ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('password_confirmation', 'Password confirmation', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
					</div>
				</div>
                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
		</div>
    </div>
@endsection