<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin/admin.css">
    <title>Index</title>
</head>
    <body>
        <form action="{{route('LoginControll')}}" method="POST" class="Login_Form">
            @csrf
            <input type="text" name="studentID" placeholder="아이디">
            <input type="password" name="studentPassword" placeholder="비밀번호">
            <button type="submit" class="Login_Button">
        </form>
        <script type="text/javascript" src="/js/get_clientIP.js"></script> 
    </body>
</html>