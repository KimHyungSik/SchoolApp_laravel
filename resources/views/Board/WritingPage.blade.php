@extends('layouts.BottomNavigation')

@section('content')
	<from>
		<tr>
			<td>제목</td>
			<td><input type="text" name="title"></td>
		</tr>
		<select name="borad_group">
			<option value="">자유 게시판</option>
			<option value="">동아리 게시판</option>
			<option value="">건의 게시판</option>
			<option value="">별명 게시판</option>
		</select>
		<tr>
			<td>내용</td>
			<td><textarea name="content"></textarea></td>
		</tr>
	</from>
@endsection
