var selectOp = document.getElementById('board-select');
var submitBtn = document.getElementById('boardButton');

selectOp.addEventListener('change', value => {
	selectIndex = selectOp.value;
	if(selectIndex =! 0){
		submitBtn.style.display='block';
	}else{
		submitBtn.style.display='none';
	}
});
