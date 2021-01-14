@extends('layouts.BottomNavigation')

@section('content')
	<ul>
		@foreach ($response as $item)
			<li>
				<a href="Board/detaildetail/{{$item['board_id']}}">
					{{$item['title']}}
				</a>
			</li>
		@endforeach
	</ul>
@endsection
