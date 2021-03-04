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
				<a href="{{ route('Writing') }}"
					><i class="fas fa-edit" style="font-size: 1rem"></i
				></a>
			</h1>
			<nav>
				<div class="community-nav-1">
					<a href="{{route('HakbuBoardList', ['major'=>'B'])}}">학부게시판</a>
					<a href="{{route('MainPage')}}">HOME</a>
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
							>{{$item['sosokName']}}</a
						></span
						>
						@endforeach
					</div>
					<div class="shadow-box-2">
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</nav>
			<form id="list-search-form" action="#" method="POST">
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
	<ul id="enters"  style="margin-top: 15rem">
		@foreach ($hakbu_list_response as $index => $item)
		<div>
			<li>
				<a href="{{route('BoardDetail', ['id' => $item['board_id'], 'group' => 0 ])}}">
					<h5>
						{{ $item["title"] }}
					</h5>
					<small>작성자 : {{$item["author"]}}</small>
					<small>작성일 : {{$date_list[$index]}}</small>
					<small>좋아요 수 : {{$item["like_count"]}}</small>
					<small>조회수 :{{$item["readnum"]}}</small>
				</a>
			</li>
		</div>
		@endforeach
	</ul>
	<script>
		var major = '{!!$major!!}';
	</script>
	<script src="{{asset('js/HakbuBoardList.js')}}"></script>
	<script src="{{ asset('js/boardlist.js') }}"></script>
</body>
@endsection
