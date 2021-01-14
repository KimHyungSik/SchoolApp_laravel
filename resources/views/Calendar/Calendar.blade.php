@extends('layouts.BottomNavigation')

@section('content')
<head>
	<link rel="stylesheet" type="text/css" href="css/Calendar.css" />
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
		<header>
			<h1
			style="margin-bottom: 0px"
			class="menu-title"
			>
			KOREAIT 시간표
		</h1>
		</header>


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
				@if($temp_row_array[$i][$index] > 0)
				   <td rowspan="{{$temp_row_array[$i][$index]}}">{{$contents_arr[$i][$index]}}</td>
				@endif
			 @endfor
		  </tr>
		   @endforeach
	</body>


@endsection
