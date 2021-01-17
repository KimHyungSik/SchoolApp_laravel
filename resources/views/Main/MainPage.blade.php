@extends('layouts.BottomNavigation')

@section('content')

	<link rel="stylesheet" href="{{ asset('css/Community.css')}}" />
	<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
></script>
	<body class="community-body">
			<section class="community-home">
				<div class="community-logo-img">
					<img src="{{asset('images/Logo.png')}}" width="100px" height="100px" />
				</div>
			</section>
			<header>
				<div class="title" role="banner">
					<h1
						style="margin-bottom: 0px"
						class="menu-title"
					><span>KOREAIT 커뮤니티</span>
						<a href="{{route('Writing')}}"><i class="fas fa-edit" style="font-size: 1.2rem;"></i></a>
					</h1>

					<nav>
						<div class="community-nav-1">
							<a class="nav1-on" href="#a">공지 사항</a>
							<a href="{{route('BoardList', ['page'=>1, 'group'=>901])}}">학생 마당</a>
						</div>
					</nav>
					<nav>
						<div class="community-nav-2">
							<a class="nav2-on" href="#a">학교</a>
							<a href="#a">교수님</a>
							<a href="#a">학과</a>
						</div>
					</nav>
				</div>
			</header>
				<ul class="list-group">
					@foreach($notice_datas as $notice_data)
					<div class="list">
						<a href="Notice/{{$notice_data['take_idx']}}">
							<li>
								<h5>{{$notice_data['title']}}</h5>
								<p class="date">
									<span><small>작성일 {{$notice_data['writeday']}}</small></span>
									<span><small >조회 {{$notice_data['readnum']}}</small></span>
								</p>
							</li>
						</a>
					</div>
					@endforeach
				</ul>
		<script type="text/javascript">
			$('nav a').each(function(){
				 if($(this).attr('href') == $(document).attr('location').href)
				   $(this).addClass('nav1-on');
				 // else $(this).removeClass('nav1-on');
			   });
			$(document).ready(function(){
			  $('nav a').on('click',function(){
			   $(this).addClass('nav1-on');
			   $(this).siblings().removeClass('nav1-on');
			  })
			});
		   </script>
		   <script type="text/javascript">
			$('nav a').each(function(){
				 if($(this).attr('href') == $(document).attr('location').href)
				   $(this).addClass('nav2-on');
				 // else $(this).removeClass('nav2-on');
			   });
			$(document).ready(function(){
			  $('nav a').on('click',function(){
			   $(this).addClass('nav2-on');
			   $(this).siblings().removeClass('nav2-on');
			  })
			});
		   </script>
    </body>
@endsection
