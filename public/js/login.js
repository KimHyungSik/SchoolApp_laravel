// 비밀번호 초기화 input 설정
$("#jumin1").on("keypress", function() {
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
	.on("keypress", function(e) {
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
	.on("input", function(e) {
		$(this).val(
			$(this)
				.val()
				.replace(/(?<=.{1})./gi, "*")
		);
	});

// 학번 검색 input 설정
$("#jumin3").on("keypress", function() {
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
	.on("keypress", function(e) {
		//숫자만 입력되게
		var inVal = "";
		if (event.keyCode === 8) {
			$("#juminE").val("");
			$("#jumin4").val("");
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
	.on("input", function(e) {
		$(this).val(
			$(this)
				.val()
				.replace(/(?<=.{1})./gi, "*")
		);
	});

// 로그인 오류 경고창
function loginCheck() {
	var loginForm = document.loginForm;
	var studentID = loginForm.studentID.value;
	var studentPassword = loginForm.studentPassword.value;

	if (
		(!studentID || !studentPassword) &&
		(!studentID || studentPassword) &&
		(studentID || !studentPassword)
	) {
		Swal.fire({
			icon: "warning",
			title: "로그인 실패",
			text: "학번 또는 비밀번호를 확인해주세요."
		});
	} else {
		loginForm.submit();
	}
}
