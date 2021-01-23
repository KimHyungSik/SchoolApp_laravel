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
		add_comment(comment, userName, studentID, result.reply_id, true,result.time_write);
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
			results.forEach(result => add_comment(result.content, userName, studentID, result.reply_id, result.is_mine,result.time_write));
		},
	});
	page++;
}

function add_comment(comment, userName, studentID, reply_id, is_mine, time_write){
	if(is_mine){
		$("#comment-id").append(`
		<li>
			<div>
			${userName}
			</div>
			<a
			type="button"
			id="comment-trash"
			data-toggle="modal"
			data-target="#myComment-delete-modal"
				><i class="fas fa-trash-alt"></i
			></a>
			<div>
				${comment}
			</div>
			<small>조금 전</small>
		</li>
		`);
	}else{
		let date = new Date(time_write);
		let write_date = `${date.getMonth}-${date.getDay} ${date.getHours}:${date.getMinutes}`
		$("#comment-id").append(`
		<li>
			<div>
			${userName}
			</div>
			<div>
				${comment}
			</div>
			<small>${write_date}</small>
		</li>
		`);
	}
}

