{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 17.08.15
 Time: 11:23
--}}

@extends('layout')

@section('title', 'Create skill')@endsection

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
				'title' => 'Create skill'
			]]
	    ])

		<div class="col-md-4 col-md-offset-4">

			<h2>Create skill</h2>

            @include('errors.form')

			{!! Form::open(['url' => route('admin.skill.store'), 'method' => 'post', 'class' => 'form-horizontal']) !!}
				<div class="form-group">
					{!! Form::label('title', 'Skill title', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::text('title', null, ['required' => 'required', 'autofocus' => 'autofocus', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
					<div class="controls">
						{!! Form::select('category_id', $categories_list, null, ['required' => 'required', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::submit('Create', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
				</div>
			{!! Form::close() !!}
		</div>
    </div>
@endsection