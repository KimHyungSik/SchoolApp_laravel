<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0"
    />
    <link rel="stylesheet" type="text/css" href="/css/Login.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./jquery-3.4.1.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
    />
    <title>Login</title>
  </head>
  <body>
    <!-- 로그인 화면 학교로고 -->
    <section>
      <header>
        <h1 class="Login_Logo">
          <img src="images/Login_Logo.png" />
        </h1>
      </header>
    </section>
    <main>
      <section>
        <div class="d-flex justify-content-center align-items-center container">
          <!-- 로그인 입력 부분 -->
          <form action="{{route('LoginControll')}}" method="POST">
          @csrf
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                id="exampleInputText"
                name="studentID"
                placeholder="Enter ID"
              />
            </div>
            <div class="form-group">
              <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                name="studentPassword"
                placeholder="Password"
              />
            </div>
            <button type="submit" class="btn btn-primary" id="Login_Btn">
              로그인
            </button>
            <span class="form-group form-check">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck1"
                name="auto_Login"
              />
              <label class="form-check-label" for="exampleCheck1"
                >자동 로그인</label
              >
              <button
                type="button"
                id="Search_ID"
                data-toggle="modal"
                data-target="#staticBackdrop"
              >
                <i class="fas fa-search">학번 검색</i>
              </button>
            </span>
          </form>
        </div>
      </section>
      <!-- 모달 창 띄우기 -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-backdrop="static"
        tabindex="-1"
        role="dialog"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">학번 검색</h5>
              </button>
            </div>
            <div class="modal-body" id="modal-body">주민번호 </div>
            <div class="Social_Number">
            <input type="tel" id="jumin1" name="inputValue" maxlength="6" /> - <input type="input" id="jumin2" maxlength="7" />
    <input type="hidden" id="juminE" name="inputValue" maxlength="7" /></div>
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
          } else if (e.keyCode >= 96 && e.keyCode <= 105) {
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
          } else if (e.keyCode >= 48 && e.keyCode <= 57) {
            inVal = String.fromCharCode(e.keyCode);
          } else {
            e.preventDefault();
            return false;
          }
          var text = $(this).val();
          if (text.length >= $(this).attr("maxlength")) {
            return;
          }
          // 주민번호에 넣고
          var jume = $("#juminE").val() + inVal;
          $("#juminE").val(jume.replace(/[^0-9]/g, ""));
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
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life
                accusamus terry richardson ad squid. Nihil anim keffiyeh
                helvetica, craft beer labore wes anderson cred nesciunt sapiente
                ea proident.
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                닫기
              </button>
              <p>
                <a
                  class="btn btn-primary"
                  href="#collapseExample"
                  role="button"
                  aria-expanded="false"
                  aria-controls="collapseExample"
                >
                  검색
                </a>
              </p>
              <!--
                <button type="button" class="btn btn-primary">검색</button>
              -->
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
