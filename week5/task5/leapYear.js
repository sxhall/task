var result = document.getElementById("result");

var year = document.getElementById("year");

function fullEmpty() {
	if(year.value.length < 1) {
		alert("输入不能为空");
		return false;
	}

	//如果输入字母，或小数等等就判断为错误
	if(isNaN(year.value) || (year.value != parseInt(year.value))) {
			alert("请输入大于零的整数");
			return false;
	}
	return true;
}