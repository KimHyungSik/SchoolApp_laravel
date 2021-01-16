@extends('layouts.BottomNavigation')

@section('content')
@if($my_board)
	<a href="{{route('ModifiedBoard',['id'=>$board_id])}}">수정</a>
	<a href="{{route('DeleteBoard',['id'=>$board_id])}}">삭제</a>
@endif
	<h1>{{$data['title']}}</h1>
	<h3>{{$data['content']}}</h3>
@endsection

