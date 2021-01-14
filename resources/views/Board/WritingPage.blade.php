@extends('layouts.BottomNavigation')

@section('content')
	<form action="{{route('PostBoard')}}" method="POST">
		@csrf
		<tr>
			<td>제목</td>
			<td><input type="text" name="title"/></td>
		</tr>
		<tr>
			<td>별명</td>
			<td><input type="text" name="nickname"/></td>
		</tr>
		<tr>
			<td>공지여부</td>
			<td><input type="checkbox" name="notice"/></td>
		</tr>
		<select name="borad_group">
			<option value="901">자유 게시판</option>
			<option value="802">동아리 게시판</option>
			<option value="902">건의 게시판</option>
			<option value="903">별명 게시판</option>
		</select>
		<tr>
			<td>내용</td>
			<td><textarea name="content"></textarea></td>
		</tr>
		<input type="submit"/>
	</form>
@endsection
