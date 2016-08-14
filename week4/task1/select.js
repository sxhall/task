var inputs = document.getElementsByTagName("input");
var check = document.getElementById("check");
var selectAll = document.getElementById("selectAll");
var selectNo = document.getElementById("selectNo");
var rev = document.getElementById("rev");

check.onclick = function(){
	for(var i = 1; i < inputs.length; i++){
		inputs[i].checked = check.checked;
	}
}

selectAll.onclick = function(){
	for(var i in inputs){
		inputs[i].checked = true;
	}
}

selectNo.onclick = function(){
	for(var i in inputs){
		inputs[i].checked = false;
	}
}

rev.onclick = function(){
	for(var i in inputs){
		inputs[i].checked = !inputs[i].checked;
	}
}