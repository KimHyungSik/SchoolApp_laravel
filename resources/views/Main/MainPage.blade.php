{{-- 커뮤니티 공지사항 네비게이션 --}}
@extends('layouts.BottomNavigation') @section('content')

<link rel="stylesheet" href="{{ asset('css/Community.css') }}" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
				<a href="{{ route('Writing') }}">
					<i class="fas fa-edit" style="font-size: 1rem"></i
				></a>
				<a
					href="#searchCollapse"
					data-toggle="collapse"
					role="button"
					aria-expanded="false"
					aria-controls="searchCollapse"
					><i class="fas fa-search" style="font-size: 1rem"></i
				></a>
			</h1>
			<nav>
				<div class="community-nav-1">
					<a href="{{route('HakbuBoardList', ['major'=>'E'])}}"
						>학부게시판</a
					>
					<a class="nav1-on" href="{{ route('MainPage') }}">HOME</a>
					<a href="{{route('BoardList', ['page'=>1, 'group'=>901])}}"
						>학생 마당</a
					>
				</div>
			</nav>
		</div>
	</header>
	<ul class="list-group">
		{{-- <div class="collapse" id="searchCollapse">
			<form
				id="list-search-form"
				action="/Board/list/1/{{ $board_group }}"
				method="POST"
			>
				@csrf
				<div class="searchbox">
					<a
						href="#searchCollapse"
						data-toggle="collapse"
						role="button"
						aria-expanded="false"
						aria-controls="searchCollapse"
						id="search-close"
					>
						<i class="fas fa-times" style="font-size: 1rem"></i>
					</a>
					<select
						name="search_key"
						class="form-select"
						id="title-content-search"
					>
						<option value="title">제목</option>
						<option value="cotent">내용</option>
						<option value="title+content">제목+내용</option>
					</select>
					@if ($search_text)
					<input
						class="form-control"
						type="search"
						placeholder="검색어를 입력하세요."
						name="search_text"
						value="{{ $search_text }}"
					/>
					@else
					<input
						class="form-control"
						type="search"
						placeholder="검색어를 입력하세요."
						name="search_text"
					/>
					@endif
				</div>
			</form>
		</div> --}}
		@foreach($notice_datas as $notice_data)
		<div class="list">
			<a href="Notice/{{ $notice_data['take_idx'] }}">
				<li>
					<h5 class="notice-list-title">
						<div>
							<i
								class="fas fa-bullhorn"
								style="
									color: rgb(255, 81, 81);
									font-size: small;
								"
							>
								공지</i
							>
						</div>
						<div>{{ $notice_data["title"] }}</div>
					</h5>
					<div class="write-day">
						<span>{{ $notice_data["writeday"] }}</span>
						<span>조회 : {{ $notice_data["readnum"] }}</span>
					</div>
				</li>
			</a>
		</div>
		@endforeach
	</ul>
	<script type="text/javascript">
		$("nav a").each(function () {
			if ($(this).attr("href") == $(document).attr("location").href)
				$(this).addClass("nav1-on");
			// else $(this).removeClass('nav1-on');
		});
		$(document).ready(function () {
			$("nav a").on("click", function () {
				$(this).addClass("nav1-on");
				$(this).siblings().removeClass("nav1-on");
			});
		});
	</script>
	<script type="text/javascript">
		$("nav a").each(function () {
			if ($(this).attr("href") == $(document).attr("location").href)
				$(this).addClass("nav2-on");
			// else $(this).removeClass('nav2-on');
		});
		$(document).ready(function () {
			$("nav a").on("click", function () {
				$(this).addClass("nav2-on");
				$(this).siblings().removeClass("nav2-on");
			});
		});
	</script>
</body>
@endsection
