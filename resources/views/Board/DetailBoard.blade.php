@extends('layouts.BottomNavigation')

@section('content')
@if($my_board)
	<a href="{{route('ModifiedBoard',['id'=>$board_id])}}">수정</a>
	<input type="button" onclick="Deleteboard({{$board_id}},{{$student_id}})" value="삭제"/>
@endif
	<h1>{{$data['title']}}</h1>
	@if ($data['author'])
		<h5>{{$data['author']}}</h5>
	@else
		<h5>익명</h5>
	@endif

	<h5>{{$data['like_count']}}</h5>
	<h3>{!!$data['content']!!}</h3>
	@if ($is_like)
		<h1>조보아씨 내려와봐유</h1>
	@endif
	<input type="button" onclick="LikeBoard({{$board_id}},{{$student_id}})" value="Like"/>

	<script>
		function Deleteboard(board_id_, studnetid_){
			$.ajax({

				type: "POST",
				url: "https://app.koreait.kr/article/board/delete/",
				dataType: "json",
				data:{
					board_id : board_id_,
					user_id : studnetid_
				},success: function (result) {
					if(result.RESULT == "100"){
						location.href=document.referrer;
					}
				},
			});
		}

		function LikeBoard(board_id_, studnetid_){
			$.ajax({
				type: "POST",
				url: "https://app.koreait.kr/article/board/like/",
				dataType: "json",
				data:{
					board_id : board_id_,
					user_id : studnetid_
				},success: function (result) {
					if(result.RESULT == "100" || result.RESULT == "110"){
						location.href = location.href;
					}
				},
			});
		}
	</script>
@endsection



