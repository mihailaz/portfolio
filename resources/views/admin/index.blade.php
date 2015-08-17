{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 16.08.15
 Time: 16:04
--}}

@extends('layout')

@section('title', 'Edit')@endsection

@section('content')

    @include('breadcrumbs', [
        'list' => [[
            'title' => 'Home',
            'url' => route('home'),
        ],[
	        'title' => 'Admin dashboard',
	        'url' => route('admin.dashboard'),
	    ]]
    ])
	<div class="container">
		<div class="col-md-12">

            @include('errors.form')

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Categories</h3>
					<a href="{{ route('admin.category.create') }}" class="btn btn-xs btn-default pull-right">
						<span class="glyphicon glyphicon-plus"></span>
						Add category
					</a>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->created_at->format('d.m.Y H:i:s') }}</td>
                                    <td>{{ $category->updated_at->format('d.m.Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', [$category->id]) }}" class="btn btn-primary btn-xs edit-btn">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            Edit
                                        </a>
                                        {!! Form::open(['url' => route('admin.category.destroy', [$category->id]), 'method' => 'delete', 'class' => 'form-inline']) !!}
                                            <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure?');">
                                                <span class="glyphicon glyphicon-remove"></span>
                                                Remove
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Skills</h3>
					<a href="{{ route('admin.skill.create') }}" class="btn btn-xs btn-default pull-right">
						<span class="glyphicon glyphicon-plus"></span>
						Add skill
					</a>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $skill)
                                <tr>
                                    <td>{{ $skill->title }}</td>
                                    <td>{{ $skill->category->title }}</td>
                                    <td>{{ $skill->created_at->format('d.m.Y H:i:s') }}</td>
                                    <td>{{ $skill->updated_at->format('d.m.Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('admin.skill.edit', [$skill->id]) }}" class="btn btn-primary btn-xs edit-btn">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            Edit
                                        </a>
                                        {!! Form::open(['url' => route('admin.skill.destroy', [$skill->id]), 'method' => 'delete', 'class' => 'form-inline']) !!}
                                            <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure?');">
	                                            <span class="glyphicon glyphicon-remove"></span>
	                                            Remove
	                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Projects</h3>
					<a href="{{ route('admin.project.create') }}" class="btn btn-xs btn-default pull-right">
						<span class="glyphicon glyphicon-plus"></span>
						Add project
					</a>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Role</th>
                                <th>Screeshot</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->role }}</td>
                                    <td>
                                        @if($project->image)
                                            <a href="{{ $project->image }}" data-toggle="lightbox">{{ $project->image }}</a>
                                        @endif
                                    </td>
                                    <td>{{ $project->created_at->format('d.m.Y H:i:s') }}</td>
                                    <td>{{ $project->updated_at->format('d.m.Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('admin.project.edit', [$project->id]) }}" class="btn btn-primary btn-xs edit-btn">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            Edit
                                        </a>
                                        {!! Form::open(['url' => route('admin.project.destroy', [$project->id]), 'method' => 'delete', 'class' => 'form-inline']) !!}
                                            <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure?');">
	                                            <span class="glyphicon glyphicon-remove"></span>
	                                            Remove
	                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>

		</div>
    </div>
@endsection