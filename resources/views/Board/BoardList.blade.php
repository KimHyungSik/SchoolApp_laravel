@extends('layouts.BottomNavigation') @section('content')
<a href="{{route('BoardList', ['page'=>1, 'group'=>901])}}">자유게시판</a>
<a href="{{route('BoardList', ['page'=>1, 'group'=>802])}}">동아리게시판</a>
<a href="{{route('BoardList', ['page'=>1, 'group'=>903])}}">건의게시판</a>
<a href="{{route('BoardList', ['page'=>1, 'group'=>902])}}">별명게시판</a>
<ul id="enters">
	@foreach ($response as $item)
	<li style="margin: 100px">
		<a href="{{route('BoardDetail', ['id' => $item['board_id']])}}">
			{{ $item["title"] }}
		</a>
	</li>
	@endforeach
</ul>
<script type="text/javascript">
	var page = 2;

	$(this).scroll(function () {
		if (
			$(this).scrollTop() >
			$(document).height() - $(window).height() - 100
		) {
			$.ajax({
				type: "POST",
				url: "https://app.koreait.kr/article/board/list/",
				dataType: "json",
				data: {
					page_num: page,
					page_size: "10",
					board_group: getParam("group"),
				},
				success: function (result) {
					for (var i = 0; i < result.length; i++) {
						$("#enters").append(
							`<li style= 'margin: 100px'> <a href='/Board/detaildetail/${result[i].board_id}'>${result[i].title}</a></li>`
						);
					}
				},
			});
			page++;
		}
	});

	function getParam() {
		var params = location.href;
		var sval = "";
		sval =
			params[params.length - 3] +
			params[params.length - 2] +
			params[params.length - 1];
		return sval;
	}
</script>
@endsection
