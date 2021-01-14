@extends('layouts.BottomNavigation') @section('content')
<body>
	<header>
		<h1 style="margin-bottom: 0px" class="menu-title">KOREAIT 더보기</h1>
	</header>
	<div>
		<a href="{{ route('LogOut') }}">로그아웃</a>
	</div>
	<div>
		<a href="{{ route('LogOut') }}">알림설정</a>
	</div>
</body>
@endsection
