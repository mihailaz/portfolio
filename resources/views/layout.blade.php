<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>devPortfolio - @yield('title')</title>
		<link rel="shortcut icon" href="/favicon.ico">
        <link href="/build/css/portfolio.css" rel="stylesheet" type="text/css">
	</head>
	<body>

		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">
						<i class="glyphicon glyphicon-fire"></i>
						devPortfolio
					</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav navbar-right">
						@if (!Request::user())
							<li><a href="/login">Sing In</a></li>
							<li><a href="/register">Sing Up</a></li>
						@else
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Request::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
									@if (Request::user()->is_admin)
		                                <li><a href="{{ route('admin.dashboard') }}">Admin dashboard</a></li>
		                            @endif
									<li><a href="/profile">Profile</a></li>
									<li><a href="/logout">Logout</a></li>
                                </ul>
                            </li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		@yield('content')

		<script type="text/javascript" src="/build/js/portfolio.js"></script>
	</body>
</html>
