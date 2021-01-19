@extends('layouts.ContentBottomNavigation')
@section('notice-board-content')
	<body>
		<header>
			<h3 class="notice-title">
				<a href="#a"
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
			@if ($is_like)
				<span>김형식</span>
			@endif
			<div class="content">
				<h3>{!!$data['content']!!}</h3>
			</div>
		</section>
		<section class="comment">
			<div>
				<ul id="comment-id">
					<li>댓글 1</li>
					<li>댓글 2</li>
				</ul>
			</div>
		</section>
		<div class="edit-comment">
			<textarea
			onkeydown="resize(this)"
			onkeyup="resize(this)"
			type="text"
			name="title"
			rows="1"
			placeholder="댓글을 입력하세요."
		></textarea>
		</div>
	</body>
</html>
@endsection
