@extends('layouts.BottomNavigation')

@section('content')
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
			height: 10px;
		}
		th, td {
		}
		th {
			text-align: center;
		}
		.Hakgi{
			display: none;
		}
		.Hakgi1{
			display: table-row;
		}
	</style>
	<select id="year" onchange="change_()">
		@foreach ($years as $year)
			<option value="{{$year}}">{{$year}}학년 1학기</option>
			<option value="{{$year + 0.5}}">{{$year}}학년 2학기</option>
		@endforeach
	</select>
	<table>
		<tr>
		@foreach ($titles as $title)
			<th>
				{{$title}}
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
		@endforeach
	</table>

	<script>
		function change_(){
			var year = document.getElementById("year").value;
			var hakgi = (2 * year) - 1;
			var Hakgi = ".Hakgi" + hakgi;
			$(".Hakgi").css("display","none")
			$(Hakgi).css("display","table-row")
		}
	</script>
@endsection
