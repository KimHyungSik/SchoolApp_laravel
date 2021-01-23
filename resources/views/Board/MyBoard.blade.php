@extends('layouts.BottomNavigation')

@section('content')
	<form action="{{route('MyBoardListPOST')}}" method="POST">
		@csrf
		<select name="search_key">
			<option value="title">제목</option>
			<option value="cotent">내용</option>
			<option value="title+content">제목+내용</option>
		</select>
		<input type="text" name="search_value"/>
		<select name="borad_group">
			<option value="0">모든 게시판</option>
			<option value="901">자유 게시판</option>
			<option value="802">동아리 게시판</option>
			<option value="902">건의 게시판</option>
			<option value="903">별명 게시판</option>
		</select>
		<input type="submit"/>
	</form>
	<ul>
	@foreach ($response as $item)
		<li>
			<a href="{{route('BoardDetail', ['id' => $item['board_id'], 'group'=>$item['board_group']])}}">
				{{$item['title']}}
			</a>
		</li>
	@endforeach
	</ul>
@endsection
