@extends('layouts.BottomNavigation')
@extends('layouts.MenuTitle')
@section('content')
<link href="{{ asset('/css/Community.css') }}" rel="stylesheet">
<link href="{{ asset('/css/Haksa/Attend.css') }}" rel="stylesheet">
<body>
	@section('menu-title')
	<section class="semester-nav">
		<div class="community-nav-2">
			<a href="{{route('SemesterPoint')}}">성적표</a>
			<a class="nav2-on" href="#">출결</a>
			<a href="#a">강의평가</a>
		</div>
	</section>
	@endsection
	<h2>결석 : {{$countAttendanceKinds['earlyLeave']}} 지각 : {{$countAttendanceKinds['tardy']}} 조퇴 : {{$countAttendanceKinds['absent']}} </h2>
	<div class="attend-grid">

		@foreach ($attend as $item)
			<div>
				<p id="attend-date">{{$item['day']}}</p>
				<p>{{$item['subjectName']}} ({{$item['teacher']}})</p>
				<p id="attend-reason">{{$item['reason']}} {{$item['count']}}</p>
			</div>
		@endforeach


	</div>
</body>

@endsection
