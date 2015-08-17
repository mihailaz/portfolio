{{--
 User: Michael Lazarev <mihailaz.90@gmail.com>
 Date: 17.08.15
 Time: 9:23
--}}

@if ($list)
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
                @foreach ($list as $key => $breadcrumb)
                    @if (array_key_exists('url', $breadcrumb) && array_key_exists($key + 1, $list))
                        <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
                    @else
                        <li class="active">{{ $breadcrumb['title'] }}</li>
                    @endif
                @endforeach
            </ol>
		</div>
	</div>
@endif