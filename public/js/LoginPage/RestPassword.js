var resetBtn = document.getElementById("btn-reset-password");
var resetStudentId = document.getElementById("inputStudentID");
var resetSocialNumFrist = document.getElementById("jumin1");
var resetSocialNumSecond = document.getElementById("jumin2");
var resetPasswordModal = document.getElementById("reset-modal-body");
var resetPasswordSuccessModal = document.getElementById("resetSuccess");

resetBtn.addEventListener('click', () => {
	var fullSocialNum = resetSocialNumFrist.value + resetSocialNumSecond.value;
	var resetPasswordUrl = "https://app.koreait.kr/rest/api/reset/password";

	resetBtn.disabled = 'disabled';
	resetBtn.style.background = "#f3f3f3";

	fetch(resetPasswordUrl, {
		method: "POST",
		headers:{
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		body: JSON.stringify({
			ResetStudentID: resetStudentId.value,
			FullSocialNum: fullSocialNum
		})
	}).then(response => response.json())
	.then(json =>{
		if(json.RESULT == 100){
			$("#staticBackdrop_PW_Reset").modal("hide");
			$("#resetSuccess").modal("show");
			resetBtn.disabled = false;
		}else{
			resetStudentId.style.borderColor = "red";
			resetSocialNumFrist.style.borderColor = "red";
			resetSocialNumSecond.style.borderColor = "red";
			resetBtn.disabled = false;
			resetBtn.style.background = "red";
		}
	});

});

