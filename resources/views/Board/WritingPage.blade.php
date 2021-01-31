<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('css/WritingPage.css') }}"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
		/>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<form action="{{ route('PostBoard') }}" method="POST">
			@csrf
			<header>
				<div>
					<h3>
						<a  href="javascript:history.back()"><i class="fas fa-times"></i></a>
						<span> 커뮤니티 글쓰기 </span>
						<button
							type="submit"
							class="btn btn-primary"
							id="boardButton"
						>
							등록
						</button>
					</h3>
				</div>
				<div class="selectbox">
					<select id="board-select" name="board_group">
						<option select>게시판을 선택하세요.</option>
						<option value="901">자유 게시판</option>
						<option value="904">동아리 게시판</option>
						<option value="902">건의 게시판</option>
						<option value="903">별명 게시판</option>
						<option value="701">학부 게시판</option>
					</select>
				</div>
				<div class="board-title">
					<textarea
						onkeydown="resize(this)"
						onkeyup="resize(this)"
						type="text"
						name="title"
						rows="1"
						placeholder="제목"
					></textarea>
				</div>
			</header>
			<div class="board-content">
				<textarea
					onkeydown="resize(this)"
					onkeyup="resize(this)"
					rows="25"
					name="content"
					placeholder="내용을 입력하세요."
				></textarea>
			</div>
		</form>
		<script>
			function resize(obj) {
				obj.style.height = "100%";
				obj.style.height = 12 + obj.scrollHeight + "px";
			}
		</script>
	</body>
</html>
