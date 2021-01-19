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
				<a href="{{ route('Writing') }}"
					><i class="fas fa-edit" style="font-size: 1.2rem"></i
				></a>
			</h1>

			<nav>
				<div class="community-nav-1">
					<a href="{{ route('MainPage') }}">공지 사항</a>
					<a
						class="nav1-on"
						href="{{route('BoardList', ['page'=>1, 'group'=>901])}}"
						>학생 마당</a
					>
				</div>
			</nav>
			<nav>
				<div class="community-nav-2">
					<div class="shadow-box-1">
						<i class="fas fa-angle-left"></i>
					</div>
					<div>
						<span
							><a
								href="{{route('BoardList', ['page'=>1, 'group'=>901])}}"
								>자유게시판</a
							></span
						>
						<span
							><a
								href="{{route('BoardList', ['page'=>1, 'group'=>904])}}"
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
					<div class="shadow-box-2">
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</nav>
			<form id="list-search-form" action="/Board/list/1/{{$board_group}}" method="POST">
				@csrf
				<div class="searchbox">
					<select name="search_key" class="form-select" id="title-content-search">
						<option value="title">제목</option>
						<option value="cotent">내용</option>
						<option value="title+content">제목+내용</option>
					</select>
					@if ($search_text)
					<input
						class="form-control"
						type="text"
						placeholder="검색어를 입력하세요."
						name="search_text"
						value="{{ $search_text }}"
					/>
					@else
					<input
						class="form-control"
						type="text"
						placeholder="검색어를 입력하세요."
						name="search_text"
					/>
					@endif

					<button type="submit" class="btn btn-primary" id="searchButton">
						검색
					</button>
				</div>
			</form>
		</div>
	</header>
	<ul id="enters">
		@foreach ($response as $item)
		<div>
			<li>
				<a href="{{route('BoardDetail', ['id' => $item['board_id']])}}">
					<h5>
						{{ $item["title"] }}
					</h5>
				</a>
			</li>
		</div>
		@endforeach
	</ul>
	<script src="{{ asset('js/boardlist.js') }}"></script>
</body>
@endsection
