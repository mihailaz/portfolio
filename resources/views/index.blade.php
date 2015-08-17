@extends('layout')

@section('title', $admin->name)@endsection

@section('content')
	<div class="container">

        <div class="jumbotron">
            <h1>{{ $admin->name }}</h1>

            <div class="pull-right">
                <img src="{{ $admin->image }}" width="250" alt="{{ $admin->name }}" class="img-rounded"/>
            </div>

            <p>Skills:</p>

            <ul class="list-unstyled">
                @foreach($categories as $category)
                    <li>
                        {{ $category->title }}
                        <ul>
                        @foreach($category->skills as $skill)
                            <li class="label label-primary">{{ $skill->title }}</li>
                        @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <p>
                <a class="btn btn-primary btn-lg contacts_btn" data-token="{!! csrf_token() !!}" data-url="{{ route('contacts') }}">
                    <span class="glyphicon glyphicon-envelope"></span>
                    Show contacts
                </a>
            </p>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="type">Projects</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($projects as $key => $project)
                @if($key % 3 == 0)
                    </div><div class="row">
                @endif
	            <div class="col-md-4">
	                <h3>{{ $project->title }}</h3>
	                <p class="text-primary">{{ $project->role }}</p>
	                <p>
	                    <a href="{{ $project->image }}" data-toggle="lightbox" data-gallery="projects">
	                        <img src="{{ $project->image }}" alt="{{ $project->title }}"/>
	                    </a>
                    </p>
	                <p>{{ $project->description }}</p>

	                @foreach($project->skills as $skill)
		                <span class="label label-primary">{{ $skill->title }}</span>
	                @endforeach
	            </div>
            @endforeach
        </div>

    </div>
@endsection