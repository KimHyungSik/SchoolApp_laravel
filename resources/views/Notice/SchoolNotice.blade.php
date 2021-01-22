<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
		/>
		<link href="{{ asset('/css/Notice.css') }}" rel="stylesheet" />
		<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
		@extends('layouts.MenuTitle-Back')
	</head>
	<body>
		@section('menu-title-back')
		@endsection
		<section>
			<h1>{{ $data["title"] }}</h1>
			<div class="writeday">
				<small>{{ $data["name"] }}</small>
				<small>{{ $data["writeday"] }}</small>
				<small>조회{{ $data["readnum"] }}</small>
			</div>

			<div class="content">
				{!! $content!!}
			</div>
		</section>
	</body>
</html>
