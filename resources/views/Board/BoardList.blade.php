@extends('layouts.BottomNavigation') @section('content')

<link
	rel="stylesheet"
	type="text/css"
	href="{{ asset('css/Board/BoardList.css') }}"
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
				<a class="write-button" href="{{ route('Writing') }}">
					<i class="fas fa-edit" style="font-size: 17px"></i
				></a>
				<a class="search-button"
					href="#searchCollapse"
					data-toggle="collapse"
					role="button"
					aria-expanded="false"
					aria-controls="searchCollapse"
					><i class="fas fa-search" style="font-size: 17px"></i
				></a>
			</h1>
			<nav>
				<div class="community-nav-1">
					<a href="{{route('HakbuBoardList', ['major'=>'E'])}}"
						>학부게시판</a
					>
					<a href="{{ route('MainPage') }}">HOME</a>
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
		</div>
	</header>
	<ul id="notice-list">
		<div class="collapse" id="searchCollapse">
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
		</div>
		@foreach ($notice_response as $index => $notice)
		<div>
			<li>
				<a
					href="{{route('BoardDetail', ['id' => $notice['board_id'], 'group' => $board_group ])}}"
				>
					<h5>
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
						<div>{{ $notice["title"] }}</div>
					</h5>
					<div class="write-day">
						<span>{{ $notice["author"] }}</span>
						<span>{{ $notice_date_list[$index] }}</span>
					</div>
				</a>
			</li>
		</div>
		@endforeach
	</ul>
	<ul id="enters">
		@foreach ($response as $index => $item)
		<div>
			<li>
				<a
					href="{{route('BoardDetail', ['id' => $item['board_id'], 'group' => $board_group ])}}"
				>
					<h5>
						{{ $item["title"] }}
					</h5>
					<div class="write-day">
						<span>{{ $item["author"] }}</span>
						<span>{{ $date_list[$index] }}</span>
						<span
							><i class="far fa-thumbs-up"></i>
							{{ $item["like_count"] }}</span
						>
						<span>조회수 : {{ $item["readnum"] }}</span>
					</div>
				</a>
			</li>
		</div>
		@endforeach
	</ul>
	<script src="{{ asset('js/boardlist.js') }}"></script>
</body>
@endsection
