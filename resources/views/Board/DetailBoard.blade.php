@extends('layouts.ContentBottomNavigation')
@section('notice-board-content')
<style>
	/* 로딩*/
	#loading {
		height: 100%;
		left: 0px;
		position: fixed;
		_position:absolute;
		top: 0px;
		width: 100%;
		filter:alpha(opacity=50);
		-moz-opacity:0.5;
		opacity : 0.5;
	}
	.loading {
		background-color: white;
		z-index: 199;
	}
	#loading_img{
		position:absolute;
		top:50%;
		left:50%;
		height:35px;
		margin-top:-75px;	//	이미지크기
		margin-left:-75px;	//	이미지크기
		z-index: 200;
	}
</style>


<body>
	<header>
		<h3 class="notice-title" >
			<a href="javascript:history.back();"
				><i class="fas fa-arrow-left" style="font-size: 1.2rem"></i
			></a>
			<span>게시판</span>
		</h3>
	</header>
	<section>
		<h1>{{ $data["title"] }}</h1>
		@if ($data['author'])
			<div class="writeday">
				<small>{{ $data["author"] }}</small>
			</div>
		@else
			<h5>익명</h5>
		@endif
		@if($my_board)
			<span>{{ $data["like_count"] }}</span>

			<a href="{{route('ModifiedBoard',['id'=>$board_id])}}">수정</a>
			<input
				type="button"
				onclick="Deleteboard({{ $board_id }},{{ $student_id }})"
				value="삭제"
			/>
		@endif
		<div class="content">
			<h3>{!!$data['content']!!}</h3>
		</div>
	</section>
	<section class="comment">
		<div>
			<ul id="comment-id">
				@foreach ($comment_datas as $comment)
					<li>
						<h3>
							{{$comment['content']}}
						</h3>
						<h6 style="display: inline">
							{{$comment['author']}} / {{$comment['like_count']}}
						</h6>
						@if ($comment['is_mine'] == '1')
						<button id="modified-comment">수정</button>
						<button id="delete-comment" onclick="delete_comment({{$student_id}}, {{$comment['reply_id']}})">삭제</button>
						@endif

						@if($comment['my_like'] == 1)
							좋아요중
						@endif
					</li>
				@endforeach
			</ul>
		</div>
		<div class="edit-comment">
			<input type="text" id="write-comment"/>
			<button id="create-comment" onclick="create_comment({{ $board_id }},{{ $student_id }},'{{$userName}}')" >댓글 등록</button>
		</div>
	</section>

	<script>
		var loading = $('<div id="loading" class="loading"></div><img id="loading_img" alt="loading" src="/gifs/viewLoading.gif" />').appendTo(document.body).hide();
		function create_comment(boardID,studentID, userName){
			var comment = $("#write-comment").val();
			if(comment == ""){
				return;
			}
			$.ajax({
			type: "POST",

			url: "https://app.koreait.kr/article/reply/write",
			dataType: "json",
			data: {
				board_id : boardID,
				user_id : studentID,
				reply_content: comment
			},
			beforeSend:function(res){
				btn = document.getElementById('create-comment');
				loading.show();
			},
			complete: function () {
				btn = document.getElementById('create-comment');
				btn.disabled = false;
				loading.hide();
       		},
			success: function (result) {
				$("#comment-id").append(`
					<li>
						<h3>
							${comment}
						</h3>
						<h6 style="display: inline">
							${userName} / 0
						</h6>
						<button id="modified-comment">수정</button>
						<button id="delete-comment" onclick="delete_comment(${studentID},${result.reply_id})>삭제</button>
					</li>
				`);
			},
		});
		}

		function delete_comment(studentID, commentID){
			$.ajax({
				type: "POST",
				url: "	https://app.koreait.kr/article/reply/delete/",
				dataType: "json",
				data: {
					reply_id : commentID,
					user_id : studentID,
				},
				beforeSend:function(){
					loading.show();
				},
				success: function(reslut){
					location.href = location.href;
				}
			});
		}
	</script>
</body>
@endsection
