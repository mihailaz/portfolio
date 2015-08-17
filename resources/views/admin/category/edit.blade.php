{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 16.08.15
 Time: 22:56
--}}

@extends('layout')

@section('title', 'Edit category')@endsection

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
		        'title' => 'Edit category'
		    ]]
	    ])

		<div class="col-md-4 col-md-offset-4">

			<h2>Edit category</h2>

            @include('errors.form')

            {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Category title', ['class' => 'control-label']) !!}
                    <div class="controls">
                        {!! Form::text('title', null, ['required' => 'required', 'autofocus' => 'autofocus', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
		</div>
    </div>
@endsection