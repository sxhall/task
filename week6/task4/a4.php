<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>注册验证</title>
	<link rel="stylesheet" type="text/css" href="./a4.css" />
</head>
<body>
	<div class="content">
		<form method="post" action="">
			<h3>用户注册</h3>
			<div class="form-field">
				<div class="field-name">用户名</div>
				<input type="text" name="uname" class="field-val" id="uname-val" />
				<div class="err-msg" id="uname-err">*必填</div>
			</div>
			<div class="form-field">
				<div class="field-name">密码</div>
				<input type="password" name="pwd" class="field-val" id="pwd-val" />
				<div class="err-msg" id="pwd-err">*必填</div>
			</div>
			<div class="form-field">
                <div class="field-name">个人网站</div>
                <input type="text" name="website" class="field-val" id="website-val">
                <div class="err-msg" id="website-err">*必填</div>
        	</div>
        	<div class="form-field">
                <div class="field-name">邮箱</div>
                <input type="text" name="email" class="field-val" id="email-val">
                <div class="err-msg" id="email-err">*必填</div>
            </div>
			<div class="form-field">
				<div class="field-name">性别</div>
				<div class="sex-val">
					<input type="radio" name="sex" class="sex-radio" value="男" id="sex-male" checked />男
					<input type="radio" name="sex" class="sex-radio" value="女" id="sex-female" />女
				</div>
				<!-- <div class="err-msg">*必填</div> -->
			</div>
			<div class="btn-field">
	            <input type="submit" name="submit" value="提交" class="btn-left" />
	            <input type="reset" name="reset" value="重置" class="btn-right" onclick="clearErr()" >
	        </div>
		</form>
	</div>
</body>
<script src="./a4.js"></script>
<?php
	inputValid();

	//验证输入是否满足正则表达式
	function inputValidWithReg($name, $pattern, $err_msg) {
	    if(!isset($_POST[$name])) {
	        return 0;
	    }

	    $val = $_POST[$name];
	    $flag = preg_match($pattern, $val); //用正则表达式$pattern来验证$val

	    echo "<script>handleInputCheckResult('{$name}', '{$val}', {$flag}, '{$err_msg}');</script>";
	    return $flag;
	}

	//验证性别输入是否合法
	function sexInputValid() {
	    if(!isset($_POST["sex"])) {
	        return 0;
	    }

	    $sex = $_POST["sex"];
	    echo "<script>saveSex('{$sex}');</script>";
	    return 1;
	}

	//验证输入合法性
	function inputValid() {
	    $valid = 1;

	    $valid &= inputValidWithReg("uname", "/^[\w_]{2,16}$/", "*2-16位,只包含英文字母,数字,下划线");
	    $valid &= inputValidWithReg("pwd", "/^[\w_]{6,16}$/", "*6-16位,只包含英文字母,数字,下划线");
	    $valid &= inputValidWithReg("website",
	        "/^https?:\/\/(([a-zA-Z0-9_-])+(\.)?)*(:\d+)?(\/((\.)?(\?)?=?&?[a-zA-Z0-9_-](\?)?)*)*$/i",
	        "*网址格式不正确");
	    $valid &= inputValidWithReg("email",
	        "/^(\w)+((-|\.)(\w)+)*@(\w)+((-|\.)(\w)+)*(\.)(\w)+$/",
	        "*邮箱格式不正确");

	    $valid &= sexInputValid();

	    //全部输入合法
	    // if($valid > 0) {
	    //     echo "<script>window.location.href = 'reg_success.php';</script>";
	    // }
	}
?>
</html>












































