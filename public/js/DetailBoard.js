var loading = $('<div id="loading" class="loading"></div><img id="loading_img" alt="loading" src="/gifs/viewLoading.gif" />').appendTo(document.body).hide();
function create_comment(boardID,studentID, userName){
	var comment = $("#write-comment").val();
	if(comment == ""){
		return;
	}
	$.ajax({
	type: "POST",

	url: "https://app.koreait.kr/article/reply/write",
	dataType: "json",
	data: {
		board_id : boardID,
		user_id : studentID,
		reply_content: comment
	},
	beforeSend:function(res){
		btn = document.getElementById('create-comment');
		loading.show();
	},
	complete: function () {
		btn = document.getElementById('create-comment');
		btn.disabled = false;
		loading.hide();
	},
	success: function (result) {
		add_comment(comment, userName, studentID, result.reply_id, true);
		$("#write-comment").val("");
	},
});
}

function delete_comment(studentID, commentID){
	$.ajax({
		type: "POST",
		url: "	https://app.koreait.kr/article/reply/delete/",
		dataType: "json",
		data: {
			reply_id : commentID,
			user_id : studentID,
		},
		beforeSend:function(){
			loading.show();
		},
		success: function(reslut){
			location.href = location.href;
		}
	});
}
var page = 2;
function more_comment(boardID, studentID, userName){
	$.ajax({
		type: "POST",
		url: "https://app.koreait.kr/article/reply/list/",
		dataType: "json",
		data: {
			page_num: page,
			page_size: "5",
			board_id: boardID,
			user_id: studentID
		},
		success: function (results) {
			results.forEach(result => add_comment(result.content, userName, studentID, result.reply_id, result.is_mine));
		},
	});
	page++;
}

function add_comment(comment, userName, studentID, reply_id, is_mine){
	if(is_mine){
		$("#comment-id").append(`
		<li>
			<h3>
				${comment}
			</h3>
			<h6 style="display: inline">
				${userName} / 0
			</h6>
			<button id="delete-comment" onclick="delete_comment(${studentID},${reply_id})">삭제</button>
		</li>
		`);
	}else{
		$("#comment-id").append(`
		<li>
			<h3>
				${comment}
			</h3>
			<h6 style="display: inline">
				${userName} / 0
			</h6>
		</li>
		`);
	}
}
