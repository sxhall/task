function getResult(){
	var obj = document.getElementById("score");
	var box2 = document.getElementById("box2");
	var arg = obj.value;
	var i = arg/10;
	i = parseInt(i);
	var j;
	switch(i){
		case 10:
		case 9:
			j = "优";
			break;
		case 8:
			j = "良";
			break;
		case 7:
			j = "可";
			break;
		case 6:
			j = "及格";
			break;
		default:
			j = "差";
	}
	box2.innerHTML = j;
}