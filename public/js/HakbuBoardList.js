var page = 2;

var page = 2;
$(this).scroll(function () {
	if ($(this).scrollTop() > $(document).height() - $(window).height() - 100) {
		$.ajax({
			type: "POST",
			url: "https://app.koreait.kr/article/board/college/",
			dataType: "json",
			data: {
				page_num: page,
				page_size: "5",
				college: major,
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
								<a href='/Board/detail/${result[i].board_id}/${getParam("group")}'>
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
