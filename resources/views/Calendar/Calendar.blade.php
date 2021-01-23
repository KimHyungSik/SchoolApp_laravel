{{-- 시간표 --}}
@extends('layouts.BottomNavigation')
@extends('layouts.MenuTitle')
@section('content')
<link href="{{ asset('/css/Calendar.css') }}" rel="stylesheet">
	<body>
		@section('menu-title')
		@endsection
	<section>
		<small>*터치 시 상세보기가 가능합니다</small>
		<table class="calendar-table" style="width:100%;" >
				<tr class="day">
					<th> </th>
					<th class="calendar-content">월</th>
					<th class="calendar-content">화</th>
					<th class="calendar-content">수</th>
					<th class="calendar-content">목</th>
					<th class="calendar-content">금</th>
				</tr>
				@for($index = 0; $index < 20; $index++)
				<tr class="class">
					@if($index == 0)
						<td id="calendar-time" rowspan="2">{!!$time_arr[0]!!}</td>
					@endif
					@if($index % 2 == 0 && $index != 0)
						<td id="calendar-time" rowspan="2">{!!$time_arr[$index/2]!!}</td>
					@endif
					@for($i = 0; $i < 5; $i++)
						@if($temp_row_array[$i][$index] > 0)
							@if($contents_arr[$i][$index] != "")
								<td id="have-schedule-content" class="calendar-conten schedule-content subject{{$temp_class_array[$i][$index]}}" rowspan="{{$temp_row_array[$i][$index]}}" onclick="tdclick({{$temp_class_array[$i][$index]}})">
									<span class="show-subject subject-title-{{$temp_class_array[$i][$index]}}">
										{!!$contents_arr[$i][$index]!!}
									</span>
									<span class="none-subject subject-description-{{$temp_class_array[$i][$index]}}">
										{!!$temp_professor_array[$i][$index]!!}</br>
										{{$temp_classroom_array[$i][$index]}}
									</span>
								</td>
							@else
								<td class="calendar-content schedule-content subject{{$temp_class_array[$i][$index]}}"  rowspan="{{$temp_row_array[$i][$index]}}">
									{{$contents_arr[$i][$index]}}
								</td>
							@endif
						@endif
					@endfor
				</tr>
				@endfor
	</section>
	<script src="{{asset('js/Calendar/Calendar.js')}}">
	</script>
	</body>
@endsection
