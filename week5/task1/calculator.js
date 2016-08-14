var result = document.getElementById("result");

var a = document.getElementById("a");
var b = document.getElementById("b");
var oprt = document.getElementById("oprt");

//当用户试图提交表单时判断输入是否为空
function fullEmpty() {
    if(a.value.length < 1 || b.value.length < 1) {
        alert("输入不能为空");
        return false;
    }
    return true;
}