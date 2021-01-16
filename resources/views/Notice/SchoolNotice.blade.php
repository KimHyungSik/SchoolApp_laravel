<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
		/>
		<link href="{{ asset('/css/Notice.css') }}" rel="stylesheet" />
	</head>
	<body>
		<header>
			<h3 class="notice-title">
				<a href="#a"><i class="fas fa-arrow-left"></i></a>
				학교 공지사항
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
				<ul>
					<li>
						댓글 1
					</li>
					<li>
						댓글 2
					</li>
					<li>
						댓글 3
					</li>
				</ul>
			</div>
		</section>
		<footer>
			<nav>
				<div>
					<a href="#a"><i class="far fa-thumbs-up"></i> 좋아요</a>
					<span>|</span>
					<a href="#a"><i class="far fa-comment-alt"></i> 댓글</a>
					<span>|</span>
					<a href="#a"><i class="fas fa-pencil-alt"></i> 댓글작성</a>
				</div>
			</nav>
		</footer>
	</body>
</html>
