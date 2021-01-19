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
					$("#enters").append(
						`<div><li><a href='/Board/detaildetail/${result[i].board_id}'><h5>${result[i].title}</h5></a></li></div>`
					);
				}
			},
		});
		page++;
	}
});
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
