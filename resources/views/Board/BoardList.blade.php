@extends('layouts.BottomNavigation') @section('content')

<link
	rel="stylesheet"
	type="text/css"
	href="{{ asset('css/BoardList.css') }}"
/>
<body class="community-body">
	<section class="community-home">
		<div class="community-logo-img">
			<img
				src="{{ asset('images/Logo.png') }}"
				width="100px"
				height="100px"
			/>
		</div>
	</section>
	<header>
		<div class="title" role="banner">
			<h1 style="margin-bottom: 0px" class="menu-title">
				<span>KOREAIT 커뮤니티</span>
				<a href="#a"
					><i class="fas fa-edit" style="font-size: 1.2rem"></i
				></a>
			</h1>

			<nav>
				<div class="community-nav-1">
					<a href="{{route('MainPage')}}">공지 사항</a>
					<a
						class="nav1-on"
						href="{{route('BoardList', ['page'=>1, 'group'=>901])}}"
						>학생 마당</a
					>
				</div>
			</nav>
			<nav>
				<div class="community-nav-2">
					<div class="shadow-box-1"><i class="fas fa-angle-left"></i></div>
					<div>
						<span
							><a
								href="{{route('BoardList', ['page'=>1, 'group'=>901])}}"
								>자유게시판</a
							></span
						>
						<span
							><a
								href="{{route('BoardList', ['page'=>1, 'group'=>802])}}"
								>동아리게시판</a
							></span
						>
						<span
							><a
								href="{{route('BoardList', ['page'=>1, 'group'=>903])}}"
								>건의게시판</a
							></span
						>
						<span
							><a
								href="{{route('BoardList', ['page'=>1, 'group'=>902])}}"
								>별명게시판</a
							></span
						>
					</div>
					<div class="shadow-box-2"><i class="fas fa-angle-right"></i></div>
				</div>
			</nav>
		</div>
	</header>

	<ul id="enters">
		<form action="/Board/list/" method="POST">
			@csrf
			<select name="search_key">
				<option value="title">제목</option>
				<option value="cotent">내용</option>
				<option value="title+content">제목+내용</option>
			</select>
			@if ($search_text)
				<input type="text" name="search_value" value="{{$search_text}}"/>
			@else
				<input type="text" name="search_value"/>
			@endif

			<select name="borad_group" selected=3>
				<option value="0">모든 게시판</option>
				<option value="901">자유 게시판</option>
				<option value="904">동아리 게시판</option>
				<option value="902">건의 게시판</option>
				<option value="903">별명 게시판</option>
			</select>
			<input type="submit"/>
		</form>
		@foreach ($response as $item)
		<div>
			<li>
				<h5>
					<a href="{{route('BoardDetail', ['id' => $item['board_id']])}}">
						{{ $item["title"] }}
					</a>
				</h5>
			</li>
		</div>
		@endforeach
	</ul>
	<script src="{{asset('js/boardlist.js')}}"></script>
</body>
@endsection
