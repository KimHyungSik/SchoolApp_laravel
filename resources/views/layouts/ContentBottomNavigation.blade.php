<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
	/>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
	/>

	<link href="{{ asset('/css/Loading/Loading.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/Layouts/ContentBottomNavigation.css') }}" rel="stylesheet" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
	@yield('notice-board-content')
	<footer>
		<nav>
			<div>
				@if ($is_like)
					<a href="javascript:void(0)" style="color: blue" onclick="LikeBoard({{$board_id}},{{$student_id}})">좋아요</a>
				@else
					<a href="javascript:void(0)" onclick="LikeBoard({{$board_id}},{{$student_id}})">좋아요</a>
				@endif

				<span>|</span>
				<a id="comment-focus"
					><i class="far fa-comment-alt"></i> 댓글</a
				>
				<span>|</span>
				<a href="#a"><i class="fas fa-pencil-alt"></i> 댓글작성</a>
			</div>
		</nav>
	</footer>
	<script src="{{asset('js/layout/ContentBottom.js')}}"></script>
	<script src="{{asset('js/loading/Loading.js')}}"></script>
	<script>
		$(document).ready(function(){
			$('#comment-focus').click(function(){
				var offset = $('#comment-id').offset();
				$('html').animate({scrollTop : offset.top}, 500);
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$("#comment-focus").click(function () {
				var offset = $("#comment-id").offset();
				$("html").animate({ scrollTop: offset.top }, 500);
			});
		});

		function Deleteboard(board_id_, studnetid_) {
			$.ajax({
				type: "POST",
				url: "https://app.koreait.kr/article/board/delete/",
				dataType: "json",
				data: {
					board_id: board_id_,
					user_id: studnetid_,
				},
				success: function (result) {
					if (result.RESULT == "100") {
						location.href = document.referrer;
					}
				},
			});
		}

		function LikeBoard(board_id_, studnetid_) {
			$.ajax({
				type: "POST",
				url: "https://app.koreait.kr/article/board/like/",
				dataType: "json",
				data: {
					board_id: board_id_,
					user_id: studnetid_,
				},
				success: function (result) {
					if (
						result.RESULT == "100" ||
						result.RESULT == "110"
					) {
						location.href = location.href;
					}
				},
			});
		}

		// 댓글 입력 폼
		function resize(obj) {
			obj.style.height = "100%";
			obj.style.height = 12 + obj.scrollHeight + "px";
		}
	</script>
</body>
</html>
