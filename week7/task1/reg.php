<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php验证码</title>
	<link rel="stylesheet" type="text/css" href="./reg.css" />
</head>
<body>
	<form action="" method="get">
		<p>
			<input type="text" size=10 name="code" class="code" />
			<img src="./code.php" id="code" height="30px" />
			<input type="submit" value="注册" id="sub" />
		</p>
	</form>
</body>
<script>
	// 对于不同的地址，浏览器就会重新请求一下
	var code = document.getElementById("code");
	code.onclick = function(){
		this.src = this.src+"?"+Math.random();
	}
</script>
</html>