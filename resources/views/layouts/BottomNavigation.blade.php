<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>타이틀</h1>
        @yield('content')
        <a href="{{route('MainPage')}}">메인</a>
        <a href="{{route('Calendar')}}">일정</a>
        <a href="{{route('SemesterPoint')}}">성적</a>
        <a href="{{route('Job')}}">일자리</a>
    </body>
</html>