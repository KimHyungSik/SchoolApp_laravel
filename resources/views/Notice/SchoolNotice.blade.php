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
		<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>

	</head>
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
