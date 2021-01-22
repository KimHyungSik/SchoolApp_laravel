@extends('layouts.BottomNavigation')
@extends('layouts.MenuTitle')
@section('content')
<link href="{{ asset('/css/SemesterPoint.css') }}" rel="stylesheet">
<link href="{{ asset('/css/Community.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<body>
	@section('menu-title')
	@endsection
	<section class="semester-nav">
		<div class="community-nav-2">
			<a class="nav2-on" href="#a">성적표</a>
			<a href="#a">출결</a>
			<a href="#a">강의평가</a>
		</div>
	</section>
	<section>
		<div class="year-select">
			<select class="form-select" id="year" onchange="change_()">
				@foreach ($years as $year)
					<option value="{{$year}}">{{$year}}학년 1학기</option>
					<option value="{{$year + 0.5}}">{{$year}}학년 2학기</option>
				@endforeach
			</select>

		</div>
		<table>
			<tr>
			@foreach ($titles as $item)
				<th>
					{{$item}}
				</th>
			@endforeach
			</tr>
			@foreach ($contents as $Hakgi_index =>$Hakgis)
				@foreach ($Hakgis as $subject_index => $subject)
					<tr class="Hakgi{{$Hakgi_index+1}} Hakgi">
						@foreach ($subject as $item_index => $item)
							<td>{{$item}}</td>
						@endforeach
					</tr>
				@endforeach
				<tr class="Hakgi{{$Hakgi_index+1}} Hakgi">
					<td>
					</td>
					<td>
					</td>
					<td>
						평점계
					</td>
					<td>
					{{$total_point[$Hakgi_index][1]}}
					</td>
					<td>
						평점평균
					</td>
					<td>
					{{$total_point[$Hakgi_index][0]}}
					</td>
				</tr>
			@endforeach
			</table>
	</section>
	<script>
		function change_(){
			var year = document.getElementById("year").value;
			var hakgi = (2 * year) - 1;
			var Hakgi = ".Hakgi" + hakgi;
			$(".Hakgi").css("display","none")
			$(Hakgi).css("display","table-row")
		}
	</script>
	<script type="text/javascript">
		$("div a").each(function () {
			if ($(this).attr("href") == $(document).attr("location").href)
				$(this).addClass("nav2-on");
			// else $(this).removeClass('nav2-on');
		});
		$(document).ready(function () {
			$("div a").on("click", function () {
				$(this).addClass("nav2-on");
				$(this).siblings().removeClass("nav2-on");
			});
		});
	</script>
</body>

@endsection
