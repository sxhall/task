//进行正则表达式验证后的处理
function handleInputCheckResult(name, val, flag, errMsg) {
    var valText = document.getElementById(name + "-val");
    var errText = document.getElementById(name + "-err");
    //保存输入的值
    valText.value = val;
    if(flag == 0) {
        errText.innerText = errMsg;
    }else{
        errText.innerHTML = "<i style='color:green;'>√</i>";
    }
}

//保存输入的性别
function saveSex(sex) {
    var sexMale = document.getElementById("sex-male");
    var sexFemale = document.getElementById("sex-female");
    if(sex == "男") {
        sexMale.checked = true;
        sexFemale.checked = false;
    } else {
        sexMale.checked = false;
        sexFemale.checked = true;
    }
}

//重置后所有的错误消息都重置为*必填
function clearErr(){
    var errMsg = document.getElementsByClassName("err-msg");
    for(var i = 0; i < errMsg.length; i++){
        errMsg[i].innerText = "*必填";
    }
}