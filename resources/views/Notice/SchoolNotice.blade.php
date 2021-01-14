<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
        />
		<link href="{{ asset('/css/Notice.css') }}" rel="stylesheet">
</head>
	<header>
		<h1 class="menu-title">
			학교 공지사항
		</h1>
	</header>
	<body>
		학교 공지입니다.
		<h1>{{$data['title']}}</h1>
		{!!$content!!}
	</body>
</html>
