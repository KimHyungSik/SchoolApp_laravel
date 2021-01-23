@extends('layouts.BottomNavigation')
@extends('layouts.MenuTitle')
@section('content')
<link href="{{ asset('/css/Community.css') }}" rel="stylesheet">
<link href="{{ asset('/css/SemesterPoint.css') }}" rel="stylesheet">
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
		<a href="#a">강의평가</a>
	</div>
</section>
	@foreach ($attend as $item)
	<div class="contour">
		<h2> 날짜 : {{$item['day']}}</h2>
		<h3> 과목 : {{$item['subjectName']}}</h3>
		<h4> 구분 : {{$item['reason']}}</h4>
		<h5> 횟수 : {{$item['count']}}</h5>
	</div>
	@endforeach
@endsection
