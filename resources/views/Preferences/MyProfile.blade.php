@extends('layouts.BottomNavigation')

@section('content')
	<h1>이름 : {{$response['user_name']}}</h1>
	@if ($response['nickname'])
		<input id="nickname" type="text" name="nickname" value="{{$response['nickname']}}">
	@else
		<input id="nickname" type="text" name="nickname" >
	@endif
	<input type="button" value="변경" onclick="post_nickname({{$student_id}})"/>
	<h3>계열 : {{$response['college']}}</h3>
	<h3>학과 : {{$response['depart']}}</h3>
	<h3>학년 : {{$response['year']}}</h3>

	<div>
		<a href="{{route('LogOut')}}">로그아웃</a>
	</div>

	<script>
		function post_nickname(studentID){
			$.ajax({
			type: "POST",
			url: "https://app.koreait.kr/article/user/set/nickname/",
			dataType: "json",
			data: {
				user_id : studentID,
				nickname : $("#nickname").val()
			},
			success: function (result){
				if(result.RESULT == "100"){
					location.href = location.href;
				}
			}
		});
	}
	</script>
@endsection


