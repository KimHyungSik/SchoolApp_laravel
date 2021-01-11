@extends('layouts.BottomNavigation')

@section('content')
<head>
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: center;
		width : 100px;
		height: 10px;
	}
	th, td {
	}
	th {
		text-align: center;
	}
	</style>
	</head>
	<body>

	 <h1>OOO의 시간표</h1>

	<table style="width:100%">
	 <caption>시간표</caption>
	  	<tr>
			<th> </th>
			<th>월</th>
			<th>화</th>
			<th>수</th>
			<th>목</th>
			<th>금</th>
	  	</tr>
		@foreach($time_arr as $index => $time)
		<tr>
			<td>{{$time}}</td>
			@for($i = 0; $i < 5; $i++)
				<td>{{$contents_arr[$i][$index]}}</td>
			@endfor
		</tr>
	    @endforeach
	</table>

	</body>


@endsection
