@extends('layouts.BottomNavigation')
@extends('layouts.MenuTitle')
@section('content')
<link href="{{ asset('/css/Community.css') }}" rel="stylesheet">
<link href="{{ asset('/css/SemesterPoint.css') }}" rel="stylesheet">
<link href="{{ asset('css/Eval/EvalList.css')}}" rel="stylesheet">
<style>
	.contour{
		border-bottom: 1px solid black;
	}
</style>

@section('menu-title')
@endsection
<section class="semester-nav">
	<div class="community-nav-2">
		<a href="{{route('SemesterPoint')}}">성적표</a>
		<a class="nav2-on" href="#">출결</a>
		<a href="{{route('EvalList')}}">강의평가</a>
	</div>
</section>
	@if($withinPeriod)
		@foreach ($evalList as $item)
			<div id="eval_list_item">
				<div>
					<h2>수업명 : {{$item['subjectName']}}</h2>
					<h4>교수님 : {{$item['name']}}</h4>
				</div>
				@if ($item['eval_status']=="N")
					<button id="btn_eval">강의평가 하기</button>
				@else
					<div id="check_eval_staut">강의 평가를 완료하였습니다</div>
				@endif
			</div>
		@endforeach
	@else
			<h1>현재 강의평가 기간이 아닙니다.</h1>
	@endif
@endsection
