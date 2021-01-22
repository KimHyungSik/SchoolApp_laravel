let subject_flag = new Array(8)
for(i = 0; i < subject_flag.length; i++){
	subject_flag[i] = 0;
}

function tdclick(index){
	if(subject_flag[index] == 0){
		$('.subject-description-' + index).addClass('show-subject');
		$('.subject-description-' + index).removeClass('none-subject');
		$('.subject-title-' + index).removeClass('show-subject');
		$('.subject-title-' + index).addClass('none-subject');
		subject_flag[index] = 1;
	}else{
		$('.subject-description-' + index).removeClass('show-subject');
		$('.subject-description-' + index).addClass('none-subject');
		$('.subject-title-' + index).addClass('show-subject');
		$('.subject-title-' + index).removeClass('none-subject');
		subject_flag[index] = 0;
	}
};
