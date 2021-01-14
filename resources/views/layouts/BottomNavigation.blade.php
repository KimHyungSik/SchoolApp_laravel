<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
        />
		<link href="{{ asset('/css/BottomNavigation.css') }}" rel="stylesheet">
		<link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
	/>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        />
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
        ></script>
        <script src="js/community.js"></script>
        <title>Community</title>
    </head>
    <body>
        @yield('content')
        <footer>
			<nav class="Footer-Nav">
			  <div>
				<a href="{{route('Calendar')}}"
				  ><i class="far fa-calendar-alt" style="font-size: 1.4rem; margin-top:10px;"><label>시간표</label></i
				></a>
				<a href="{{route('SemesterPoint')}}"
				  ><i class="fas fa-chart-line" style="font-size: 1.4rem; margin-top:10px;"><label>성적조회</label></i
					></a>
				<a href="{{route('MainPage')}}"
				  ><i class="far fa-comment-alt" style="font-size: 1.4rem; margin-top:10px;"><label>커뮤니티</label></i
					></a>
				<a href="{{route('Job')}}"
				  ><i class="far fa-building" style="font-size: 1.4rem; margin-top:10px;"><label>구인의뢰</label></i
					></a>
				<a href="{{route('Preferences')}}"
				  ><i class="fas fa-ellipsis-h" style="font-size: 1.4rem; margin-top:10px;"><label>더보기</label></i
					></a>
				<span></span>
			  </div>
			</nav>
		  </footer>
		  <script type="text/javascript">
			$('nav a').each(function(){
				 if($(this).attr('href') == $(document).attr('location').href)
				   $(this).addClass('on');
				 else $(this).removeClass('on');
			   });
			$(document).ready(function(){
			  $('nav a').on('click',function(){
			   $(this).addClass('on');
			   $(this).siblings().removeClass('on');
			  })
			});
		   </script>
    </body>
</html>
