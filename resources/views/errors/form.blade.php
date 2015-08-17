{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 16.08.15
 Time: 20:18
--}}


@if (count($errors) > 0)
	<div class="alert alert-danger">
	    <ul>
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@elseif (session()->has('message'))
	<div class="alert alert-{{ session()->has('message_level') ? session()->get('message_level') : 'success' }}">
        {{ session()->get('message') }}
    </div>
@endif