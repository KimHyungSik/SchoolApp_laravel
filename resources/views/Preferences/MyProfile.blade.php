@extends('layouts.MenuTitle-Back')
	@section('menu-title-back') @endsection
	<link href="{{ asset('/css/Preferences/MyProfile.css') }}" rel="stylesheet" />
	<link rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"/>
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
	/>
	<script
		src="https://code.jquery.com/jquery-3.5.1.min.js"
	></script>
<body>
	<section>
		<div>이름<span>{{ $response["user_name"] }}</span></div>
		<div>
			@if ($response['nickname'])
				<input
				id="nickname"
				type="text"
				name="nickname"
				value="{{ $response['nickname'] }}"
			/>
			@else
			<input id="nickname" type="text" name="nickname" placeholder="별명을 입력하세요."/>
			@endif
			<input
				type="button"
				value="변경"
				onclick="post_nickname({{ $student_id }})"
			/>
		</div>
		<div>계열<span>{{ $response["college"] }}</span></div>
		<div>학과<span>{{ $response["depart"] }}</span></div>
		<div>학년<span>{{ $response["year"] }}</span></div>
	</section>

		<div class="logout">
			<button
				href="{{ route('LogOut') }}"
				type="button"
				class="btn btn-secondary btn-lg"
			>
				<a href="{{ route('LogOut') }}">로그아웃</a>
			</button>
		</div>
	<script>
		function post_nickname(studentID) {
			$.ajax({
				type: "POST",
				url: "https://app.koreait.kr/article/user/set/nickname/",
				dataType: "json",
				data: {
					user_id: studentID,
					nickname: $("#nickname").val(),
				},
				success: function (result) {
					if (result.RESULT == "100") {
						location.href = location.href;
					}
				},
			});
		}
	</script>
</body>
