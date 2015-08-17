{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 16.08.15
 Time: 17:50
--}}

@extends('layout')

@section('title', 'Create project')@endsection

@section('content')

	<div class="container">

	    @include('breadcrumbs', [
			'list' => [[
				'title' => 'Home',
				'url' => route('home'),
			],[
				'title' => 'Admin dashboard',
	            'url' => route('admin.dashboard'),
			],[
				'title' => 'Create project'
			]]
	    ])

		<div class="col-md-4 col-md-offset-4">

			<h2>Create project</h2>

            @include('errors.form')

			{!! Form::open(['url' => route('admin.project.store'), 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}
				<div class="form-group">
					{!! Form::label('title', 'Project title', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::text('title', null, ['required' => 'required', 'autofocus' => 'autofocus', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::textarea('description', null, ['required' => 'required', 'class' => 'form-control noresize', 'rows' => 5]) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('role', 'Role', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::text('role', null, ['required' => 'required', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('skills', 'Skills', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::select('skills[]', $skills_list, null, ['required' => 'required', 'class' => 'form-control', 'multiple' => 'multiple']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('image', 'Screenshot', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::file('image', ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::submit('Create', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
				</div>
			{!! Form::close() !!}
		</div>
    </div>
@endsection