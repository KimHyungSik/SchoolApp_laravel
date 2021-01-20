{{-- 각 메뉴 제목 (뒤로가기 버튼 포함) --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
	/>
	<link href="{{ asset('/css/Layouts/MenuTitleBack.css') }}" rel="stylesheet">
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
	/>
</head>
<body>
	@yield('menu-title-back')
		<header>
			<h3 class="notice-title">
				<a href="javascript:history.go(-1)"><i class="fas fa-arrow-left" style="font-size: 1.2rem;"></i></a>
				<span>{{$title}}</span>
			</h3>
		</header>
</body>
</html>
