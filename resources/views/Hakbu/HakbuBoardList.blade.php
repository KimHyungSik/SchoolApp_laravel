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
					<a
						class="nav1-on"
						href="{{route('HakbuBoardList', ['major'=>'B'])}}"
						>학부게시판</a
					>
					<a href="{{ route('MainPage') }}">HOME</a>
					<a href="{{route('BoardList', ['page'=>1, 'group'=>901])}}"
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
						@foreach ($majorList as $item)
						<span
							><a
								href="{{route('HakbuBoardList', ['major' => $item['sosokCode']])}}"
								>{{ $item["sosokName"] }}</a
							></span
						>
						@endforeach
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
			<form id="list-search-form" action="#" method="POST">
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
		@foreach ($hakbu_list_response as $index => $item)
		<div>
			<li>
				<a
					href="{{route('BoardDetail', ['id' => $item['board_id'], 'group' => 0 ])}}"
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
	<script>
		var major = "{!!$major!!}";
	</script>
	<script src="{{ asset('js/HakbuBoardList.js') }}"></script>
</body>
@endsection
