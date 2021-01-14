<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
        />
        <link rel="stylesheet" type="text/css" href="css/Login.css" />
		<link rel="stylesheet"
		      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		<title>Login</title>
    </head>
    <body class="login-body">
        <!-- 로그인 화면 학교로고 -->
            <header>
                <h1 class="login-logo">
                    <img src="images/Login_Logo.png" />
                </h1>
            </header>
        <main>
                <div
                    class="d-flex justify-content-center align-items-center container"
                >
                    <!-- 로그인 입력 부분 -->
                    <form name="loginForm" action="{{route('LoginControll')}}" method="POST">
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
                        <div class="login-auto">
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
								type="button"
								onclick="loginCheck()"
                                class="btn btn-primary"
								id="loginButton"
                            >로그인</button>
                        </div>
                    </form>
                </div>
            <div class="login-option">
                <div>
                    <button
                        type="button"
                        id="resetPassword"
                        data-toggle="modal"
                        data-target="#staticBackdrop_PW_Reset"
                    >
                        PW 초기화
                    </button>
                    <span>|</span>
                    <button
                        type="button"
                        id="searchID"
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
                <div class="modal-dialog" id="modalDialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">
                                비밀번호 초기화
                            </h4>
						</div>
						<div id="modalBody">
							<label for="resetStudentID">
								학번을 입력하세요.
							</label>
								<form class="reset-student-id">
									<input
										type="tel"
										id="resetStudentID"
										name="inputValue"
										maxlength="8"
									/>
								</form>
								<label for="reset-social-number">
									주민번호를 입력하세요.
								</label>
								<form class="reset-social-number">
									<input
										type="tel"
										id="jumin1"
										name="inputValue"
										maxlength="6"
									/>
									- <input type="tel" id="jumin2" maxlength="7"/>
									<input
										type="hidden"
										id="juminE"
										name="inputValue"
										maxlength="7"
									/>
								</form>
						</div>

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
                                    href="#resetSuccess"
                                >
                                    초기화
                                </button>
                            </form>
                        </div>
                        <div
                            class="modal fade"
                            id="resetSuccess"
                            data-backdrop="static"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="staticBackdropLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog" id="resetModalDialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body" id="resetModalBody">
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
                <div class="modal-dialog" id="modalDialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                학번 검색
                            </h5>
                        </div>
                        <div class="modal-body" id="modalBody">
							<label>주민번호를 입력하세요.</label>
							<form>
								<div class="search-social-number">
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
						</div>
                        <div id="demo" class="collapse">
                            학번 : 20074008<br />
                            학과 : 드론로봇
                        </div>
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
		<script type="text/javascript" src="js/login.js"></script>
    </body>
</html>
