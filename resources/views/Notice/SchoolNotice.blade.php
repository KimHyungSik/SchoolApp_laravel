@extends('layouts.ContentBottomNavigation') @section('notice-board-content')
	<body>
		<header>
			<h3 class="notice-title">
				<a href="#a"><i class="fas fa-arrow-left" style="font-size: 1.2rem;"></i></a>
				<span>학교 공지사항</span>
			</h3>
		</header>
		<section>
			<h1>{{ $data["title"] }}</h1>
			<div class="writeday">
				<small>{{ $data["name"] }}</small>
				<small>{{ $data["writeday"] }}</small>
				<small>조회{{ $data["readnum"] }}</small>
			</div>

			<div class="content">
				{!! $content!!}
			</div>
		</section>
		<section class="comment">
			<div>
				<ul id="comment-id">
					<li>
						댓글 1
					</li>
					<li>
						댓글 2
					</li>
					<li>
						댓글 3
					</li>
					<li>
						댓글 1
					</li>
					<li>
						댓글 2
					</li>
					<li>
						댓글 3
					</li>
					<li>
						댓글 1
					</li>
					<li>
						댓글 2
					</li>
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
