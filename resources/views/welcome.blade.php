<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin/admin.css">
    <title>Index</title>
</head>
    <body>
        <!--에러로 인한 redirect 시 alert 발생-->
        @if($errors->any())
            <?php
                echo '<script>alert("학번확인실패");</script>';
            ?>
        @endif

        <form action="{{route('SemesterPoint')}}" method="POST" class="Semester_Form">
            @csrf
            <input type="text" name="studentID" placeholder="아이디">
            <input type="password" name="studentPassword" placeholder="비밀번호">
            <button type="submit" class="Semester_Point_Button">
        </form>
        
    </body>
</html>