<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
        />
        <link rel="stylesheet" type="text/css" href="css/Login.css" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"
        ></script>
        <title>Login</title>
    </head>
    <body class="Login_Body">
        <!-- 로그인 화면 학교로고 -->
            <header>
                <h1 class="Login_Logo">
                    <img src="images/Login_Logo.png" />
                </h1>
            </header>
        <main>
                <div
                    class="d-flex justify-content-center align-items-center container"
                >
                    <!-- 로그인 입력 부분 -->
                    <form action="{{route('LoginControll')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <input
                                type="tel"
                                class="form-control"
                                id="exampleInputText"
                                name="studentID"
                                placeholder="Student ID"
                                maxlength="8"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                type="password"
                                class="form-control"
                                name="studentPassword"
                                id="exampleInputPassword1"
                                placeholder="Password"
                            />
                        </div>
                        <div class="Login_Auto">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck1"
                                name="auto_Login"
                            />
                            <label class="form-check-label" for="exampleCheck1"
                                >자동 로그인</label
                            >
                        </div>
                        <div>
                            <button
                                type="submit"
                                class="btn btn-primary"
                                id="Login_Btn"
                            >
                                로그인
                            </button>
                        </div>
                    </form>
                </div>
            <div class="Login_Option">
                <div>
                    <button
                        type="button"
                        id="Reset_PW"
                        data-toggle="modal"
                        data-target="#staticBackdrop_PW_Reset"
                    >
                        PW 초기화
                    </button>
                    <span>|</span>
                    <button
                        type="button"
                        id="Search_ID"
                        data-toggle="modal"
                        data-target="#staticBackdrop"
                    >
                        <i class="fas fa-search"> 학번 검색</i>
                    </button>
                </div>
            </div>
            <!--비밀번호 초기화 모달 창 띄우기-->
            <div
                class="modal fade"
                id="staticBackdrop_PW_Reset"
                data-backdrop="static"
                tabindex="-1"
                role="dialog"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" id="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                비밀번호 초기화
                            </h5>
                        </div>
                        <span class="modal-body" id="modal-body">
                        </span>
                            <form class="Reset_Student_ID">
                                학번 :
                                <input
                                    type="tel"
                                    id="Reset_Student_ID"
                                    name="inputValue"
                                    maxlength="8"
                                />
                            </form>
                        <span class="modal-body" id="modal-body">
                          <form class="Reset_Social_Number">
                            주민번호 :
                                <input
                                    type="tel"
                                    id="jumin1"
                                    name="inputValue"
                                    maxlength="6"
                                />
                                - <input type="tel" id="jumin2" maxlength="7" />
                                <input
                                    type="hidden"
                                    id="juminE"
                                    name="inputValue"
                                    maxlength="7"
                                />
                        </span>
                        <script>
                            $("#jumin1").on("keypress", function () {
                                var text = $("#jumin1")
                                    .val()
                                    .replace(/[^0-9]/g, "");
                                if (text.length >= $(this).attr("maxlength")) {
                                    $("#jumin2").focus();
                                    return;
                                }
                                $(this).val(text);
                            });
                            $("#jumin2")
                                .on("keypress", function (e) {
                                    //숫자만 입력되게
                                    var inVal = "";
                                    if (event.keyCode === 8) {
                                        $("#juminE").val("");
                                        $("#jumin2").val("");
                                    } else if (
                                        e.keyCode >= 96 &&
                                        e.keyCode <= 105
                                    ) {
                                        switch (e.keyCode) {
                                            case 96:
                                                inVal = 0;
                                                break;
                                            case 97:
                                                inVal = 1;
                                                break;
                                            case 98:
                                                inVal = 2;
                                                break;
                                            case 99:
                                                inVal = 3;
                                                break;
                                            case 100:
                                                inVal = 4;
                                                break;
                                            case 101:
                                                inVal = 5;
                                                break;
                                            case 102:
                                                inVal = 6;
                                                break;
                                            case 103:
                                                inVal = 7;
                                                break;
                                            case 104:
                                                inVal = 8;
                                                break;
                                            case 105:
                                                inVal = 9;
                                                break;
                                        }
                                    } else if (
                                        e.keyCode >= 48 &&
                                        e.keyCode <= 57
                                    ) {
                                        inVal = String.fromCharCode(e.keyCode);
                                    } else {
                                        e.preventDefault();
                                        return false;
                                    }
                                    var text = $(this).val();
                                    if (
                                        text.length >= $(this).attr("maxlength")
                                    ) {
                                        return;
                                    }
                                    // 주민번호에 넣고
                                    var jume = $("#juminE").val() + inVal;
                                    $("#juminE").val(
                                        jume.replace(/[^0-9]/g, "")
                                    );
                                })
                                .on("input", function (e) {
                                    $(this).val(
                                        $(this)
                                            .val()
                                            .replace(/(?<=.{1})./gi, "*")
                                    );
                                });
                        </script>
                        <!-- 학번 검색 결과 -->
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                닫기
                            </button>
                            <form>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    href="#Reset_Success"
                                >
                                    초기화
                                </button>
                            </form>
                        </div>
                        <div
                            class="modal fade"
                            id="Reset_Success"
                            data-backdrop="static"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="staticBackdropLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog" id="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body" id="reset-modal-body">
                                        비밀번호가 초기화 되었습니다.
                                    </div>
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-dismiss="modal"
                                        >
                                            닫기
                                        </button>
                                        <form>
                                            <button
                                                type="button"
                                                class="btn btn-primary"
                                                data-dismiss="modal"
                                            >
                                                확인
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--학번 검색 모달 창 띄우기 -->
            <div
                class="modal fade"
                id="staticBackdrop"
                data-backdrop="static"
                tabindex="-1"
                role="dialog"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" id="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                학번 검색
                            </h5>
                        </div>
                        <div class="modal-body" id="modal-body">
                            주민번호를 입력하세요.
                        </div>
                        <form>
                            <div class="Search_Social_Number">
                                <input
                                    type="tel"
                                    id="jumin3"
                                    name="inputValue"
                                    maxlength="6"
                                />
                                - <input type="tel" id="jumin4" maxlength="7" />
                                <input
                                    type="hidden"
                                    id="juminE"
                                    name="inputValue"
                                    maxlength="7"
                                />
                            </div>
                        </form>
                        <div id="demo" class="collapse">
                            학번 : 20074008<br />
                            학과 : 드론로봇
                        </div>
                        <script>
                            $("#jumin3").on("keypress", function () {
                                var text = $("#jumin3")
                                    .val()
                                    .replace(/[^0-9]/g, "");
                                if (text.length >= $(this).attr("maxlength")) {
                                    $("#jumin4").focus();
                                    return;
                                }
                                $(this).val(text);
                            });
                            $("#jumin4")
                                .on("keypress", function (e) {
                                    //숫자만 입력되게
                                    var inVal = "";
                                    if (event.keyCode === 8) {
                                        $("#juminE").val("");
                                        $("#jumin4").val("");
                                    } else if (
                                        e.keyCode >= 96 &&
                                        e.keyCode <= 105
                                    ) {
                                        switch (e.keyCode) {
                                            case 96:
                                                inVal = 0;
                                                break;
                                            case 97:
                                                inVal = 1;
                                                break;
                                            case 98:
                                                inVal = 2;
                                                break;
                                            case 99:
                                                inVal = 3;
                                                break;
                                            case 100:
                                                inVal = 4;
                                                break;
                                            case 101:
                                                inVal = 5;
                                                break;
                                            case 102:
                                                inVal = 6;
                                                break;
                                            case 103:
                                                inVal = 7;
                                                break;
                                            case 104:
                                                inVal = 8;
                                                break;
                                            case 105:
                                                inVal = 9;
                                                break;
                                        }
                                    } else if (
                                        e.keyCode >= 48 &&
                                        e.keyCode <= 57
                                    ) {
                                        inVal = String.fromCharCode(e.keyCode);
                                    } else {
                                        e.preventDefault();
                                        return false;
                                    }
                                    var text = $(this).val();
                                    if (
                                        text.length >= $(this).attr("maxlength")
                                    ) {
                                        return;
                                    }
                                    // 주민번호에 넣고
                                    var jume = $("#juminE").val() + inVal;
                                    $("#juminE").val(
                                        jume.replace(/[^0-9]/g, "")
                                    );
                                })
                                .on("input", function (e) {
                                    $(this).val(
                                        $(this)
                                            .val()
                                            .replace(/(?<=.{1})./gi, "*")
                                    );
                                });
                        </script>
                        <!-- 학번 검색 결과 -->
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                닫기
                            </button>
                            <form>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-toggle="collapse"
                                    data-target="#demo"
                                >
                                    검색
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
