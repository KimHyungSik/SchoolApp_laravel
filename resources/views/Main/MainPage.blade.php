@extends('layouts.BottomNavigation')

@section('content')
<body class="Community_Body">
            <header>
                <section class="Community_Home">
                    <div class="Community_Logo_Img">
                        <img src="images/Logo.png" width="100px" height="100px" />
                    </div>
                </section>
                <div class="Title" role="banner">
                    <h1
                        style="margin-bottom: 0px"
                        class="Community_Title"
                    >
                        KOREAIT 커뮤니티
                    </h1>

                <div>
                    <nav class="Community_Nav_1">
                        <ul style="-webkit-padding-start: 0px">
                            <li class="Nav1_on"><a href="#a">공지 사항</a></li>
                            <li><a href="#a">자유게시판</a></li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <nav class="Community_Nav_2">
                        <ul style="-webkit-padding-start: 0px">
                            <li class="Nav2_on"><a href="#a">학교</a></li>
                            <li><a href="#a">교수님</a></li>
                            <li><a href="#a">학과</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            </header>
        <section>
            <ul class="list-group">
                @foreach($notice_datas as $notice_data)
                <div>
                    <li>
                    <a href="notice/{{$notice_data['take_idx']}}"><h5>{{$notice_data['title']}}</h5>
                        <small>{{$notice_data['writeday']}}{{$notice_data['readnum']}}</small>
                    </a>

                    </li>
                </div>
                @endforeach
            </ul>
        </section>

    </body>
@endsection
