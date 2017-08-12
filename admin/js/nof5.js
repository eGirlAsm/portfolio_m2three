/* 按下F5时仅刷新iframe页面 */
function inactiveF5(e) {
	e=window.event||e;
	var key = e.keyCode;
	if (key == 116){
		parent.window.frames[1].location.reload();
		if(document.all) {
			e.keyCode = 0;
			e.returnValue = false;
		}else {
			e.cancelBubble = true;
			e.preventDefault();
		}
	}
}

document.onkeydown=inactiveF5;