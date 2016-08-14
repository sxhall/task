var active = document.getElementsByClassName("active");
var activeH = active[0]; //这是class为active的h3元素对象
var activeDiv = active[1]; //这是class为active的div元素对象
function changeTab(obj){
	var nextNode = null;
	activeH.removeAttribute("class");
	activeH = obj;
	obj.setAttribute("class","active");

	activeDiv.removeAttribute("class");
	if(obj.nextSibling.nodeType == 3){ // 3为文本节点类型，空格换行都是文本节点
		nextNode = obj.nextSibling.nextSibling;
	}else{
		nextNode = obj.nextSibling;
	}
	nextNode.setAttribute("class","active");
	activeDiv = nextNode;
}