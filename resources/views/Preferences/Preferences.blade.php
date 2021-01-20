{{-- 더보기 --}}
@extends('layouts.BottomNavigation')
@section('content')
<link href="{{ asset('/css/Preferences.css') }}" rel="stylesheet">
	<body>
		<section>
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
		</section>
	</body>
@endsection
