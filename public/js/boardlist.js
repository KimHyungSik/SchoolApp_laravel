/* Nav_1 => 공지사항, 자유게시판 */
$("nav a").each(function () {
	if ($(this).attr("href") == $(document).attr("location").href)
		$(this).addClass("nav1-on");
	// else $(this).removeClass('nav1-on');
});
$(document).ready(function () {
	$("nav a").on("click", function () {
		$(this).addClass("nav1-on");
		$(this).siblings().removeClass("nav1-on");
	});
});

/* Nav_2 => 자유게시판 동아리게시판 건의사항 별명게시판 */
$("nav a").each(function () {
	if ($(this).attr("href") == $(document).attr("location").href)
		$(this).addClass("nav2-on");
	// else $(this).removeClass('nav2-on');
});
$(document).ready(function () {
	$("nav a").on("click", function () {
		$(this).addClass("nav2-on");
		$(this).siblings().removeClass("nav2-on");
	});
});

var page = 2;
$(this).scroll(function () {
	if ($(this).scrollTop() > $(document).height() - $(window).height() - 100) {
		$.ajax({
			type: "POST",
			url: "https://app.koreait.kr/article/board/list/",
			dataType: "json",
			data: {
				page_num: page,
				page_size: "10",
				board_group: getParam("group"),
				searck_key: document.getElementById("title-content-search").value,
				search_value: $("#search_text").val()
			},
			success: function (result) {
				for (var i = 0; i < result.length; i++) {
					//현재 시간 및 리스트 시간 구하기
					let today = new Date();
					let list_date = result[i]["time_write"];
					let today_format_date = format_date(today, true);
					let result_format_date = format_date(list_date, true);
					let result_date = result_format_date;

					//현제 날짜와 리스트 날짜 비교
					if(today_format_date == result_format_date){
						result_date = fomat_time(list_date);
					}else{
						result_date = format_date(list_date, false);
					}
					$("#enters").append(
						`<div>
							<li>
								<a href='/Board/detaildetail/${result[i].board_id}'>
									<h5>
										${result[i].title}
									</h5>
									<small>작성자 : ${result[i]["author"]}</small>
									<small>작성일 : ${result_date}</small>
									<small>좋아요 수 : ${result[i]["like_count"]}</small>
									<small>조회수 : ${result[i]["readnum"]}</small>
								</a>
							</li>
						</div>`
					);
				}
			},
		});
		page++;
	}
});

function format_date(date_data, is_year){
	let date_ = new Date(date_data);
	let year = date_.getFullYear();
	let month = date_.getMonth();
	let date = date_.getDate();
	if(is_year){
		return `${year}-${month+1}-${date}`;
	}else{
		return `${month+1}-${date}`;
	}

}

function fomat_time(time_data){
	let date_ =  new Date(time_data);
	let hours = date_.getHours();
	let mintes = date_.getMintes();
	return `${hours} : ${mintes}`;
}

function getParam() {
	var params = location.href;
	var sval = "";
	sval =
		params[params.length - 3] +
		params[params.length - 2] +
		params[params.length - 1];
	return sval;
}

function getSelectValue() {
	var selectedValue = document.getElementById("board-title-search").value;
	var url = "/Board/list/1/";
	document.getElementById("list-search-form").action = url + selectedValue;
}
