{{-- 내 게시글 --}}
@extends('layouts.MenuTitle-Back')
<link href="{{ asset('/css/Board/MyBoard.css') }}" rel="stylesheet" />
<body>
	@section('menu-title-back')
	@endsection
	<div class="searchbox">
		<section>
			<form action="{{route('MyBoardListPOST')}}" method="POST">
				@csrf
				<div>
					<select id="formSelect" class="form-select" name="search_key">
						<option value="title">제목</option>
						<option value="cotent">내용</option>
						<option value="title+content">제목+내용</option>
					</select>
				</div>
				<div>
					<select id="formSelect" class="form-select" name="borad_group">
						<option value="0">모든 게시판</option>
						<option value="901">자유 게시판</option>
						<option value="802">동아리 게시판</option>
						<option value="902">건의 게시판</option>
						<option value="903">별명 게시판</option>
					</select>
				</div>
				<div class="myboard-input-button">
					<input id="myboardSearchInput" placeholder="검색어를 입력하세요." class="form-control" type="text" name="search_value"/>
					<input class="btn btn-primary" value="검색" type="submit"/>
				</div>
			</form>
		</section>
	</div>
	<ul id="notice-list">
		@foreach ($response as $index => $item)
		<div>
			<li>
				<a href="{{route('BoardDetail', ['id' => $item['board_id'], 'group' => $board_group ])}}">
					<h5>
						{{ $item["title"] }}
					</h5>
					<small>작성자 : {{$user_name}}</small>
					<small>작성일 : {{$date_list[$index]}}</small>
					<small>좋아요 수 : {{$item["like_count"]}}</small>
					<small>조회수 :{{$item["readnum"]}}</small>
				</a>
			</li>
		</div>
		@endforeach
	</ul>
</body>
