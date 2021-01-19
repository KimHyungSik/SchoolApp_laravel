@extends('layouts.BottomNavigation')

@section('content')
	<body>
		<header>
			<h1
			style="margin-bottom: 0px"
			class="menu-title"
			>
				KOREAIT 더보기
			</h1>
		</header>
		<div>
			<a href="{{route('LogOut')}}">로그아웃</a>
		</div>
		<div>
			<a href="">알림설정</a>
		</div>
		<div>
			<a href="{{route('MyBoardListGET')}}">내 게시글</a>
		</div>
		<div>
			<a href="#a">앱 버전</a>
		</div>
		<div>
			<a href="{{route('MyProFile')}}">내정보 (별명변경, 학번, 이름, 계열, 학과, 학년)</a>
		</div>
	</body>
@endsection
