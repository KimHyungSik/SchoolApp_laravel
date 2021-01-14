@extends('layouts.BottomNavigation')

@section('content')
	<a href="{{route('BoardList', ['page'=>1, 'group'=>901])}}">자유게시판</a>
	<a href="{{route('BoardList', ['page'=>1, 'group'=>802])}}">동아리게시판</a>
	<a href="{{route('BoardList', ['page'=>1, 'group'=>903])}}">건의게시판</a>
	<a href="{{route('BoardList', ['page'=>1, 'group'=>902])}}">별명게시판</a>
	<ul>
		@foreach ($response as $item)
			<li>
				<a href="{{route('BoardDetail', ['id' => $item['board_id']])}}">
					{{$item['title']}}
				</a>
			</li>
		@endforeach
	</ul>
@endsection
