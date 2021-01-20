{{-- 각 메뉴 제목 --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
	/>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<link href="{{ asset('/css/Layouts/MenuTitle.css') }}" rel="stylesheet">
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
	/>
</head>
<body>
	@yield('menu-title')
		<header>
			<h3 class="notice-title">{{$title}}</h3>
		</header>
</body>
</html>
