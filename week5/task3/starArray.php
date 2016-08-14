<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php实现行数星阵</title>
	<link rel="stylesheet" type="text/css" href="./starArray.css" />
</head>
<body>
	<div id="box">
		<h3>实现指定的行数星阵</h3>
		<form action="" method="post" onsubmit="return fullEmpty()">
			输入行数：<input type="text" name="row" id="row" />
			<button type="submit" id="submit">提交</button>
		</form>
	</div>
</body>
<script>
	var row = document.getElementById("row");
	function fullEmpty() {
		if(row.value.length < 1) {
			alert("请输入行数");
			return false;
		}

		if(isNaN(row.value) || (row.value != parseInt(row.value))) {
			alert("请输入大于零的整数");
			return false;
		}
		return true;

	}
</script>
<?php
	function pxsb($row) {
			echo '<h3>平行四边形</h3>';
			for($i = 1; $i < $row; $i++) {
				for($z = 1; $z < $row - $i; $z++) {
					echo "&nbsp;"; //输出空格
				}
				for($j = 1; $j < $row; $j++){
					echo "*"; //输出星号
				}
				echo "<br />";
			}
		}
		
	if(isset($_POST["row"])) {
		$row = $_POST["row"];
		$a = $row;
		$row = $row + 1; //因为我下面的比较都是用 $i < $row;
		


		echo "<script>row.value = '{$a}'</script>";

		echo "<div id='result'>";

		//平行四边形
		pxsb($row);
		//直角三角形
		echo '<h3>直角三角形</h3>';
		for($i = 1; $i < $row; $i++) {
			// for($z = 1; $z < $i; $z++) {
			// 	echo "&nbsp;"; //输出空格
			// }
			for($j = 1; $j < $i + 1; $j++){
				echo "*"; //输出星号
			}
			echo "<br />";
		}

		//等腰三角形
		echo '<h3>等腰三角形</h3>';
		for($i = 1; $i < $row; $i++) {
			for($z = 1; $z < $row - $i; $z++) {
				echo "<i style='color: #fff'>#</i>"; //输出空格时，不会对齐，就采用#
			}
			for($j = 1; $j <= 2*$i - 1; $j++){
				echo "*"; //输出星号
			}
			echo "<br />";
		}

		//菱形
		echo '<h3>菱形</h3>';
		for($i = 1; $i < $row; $i++){
			for($z = 1; $z < $row - $i; $z++){
				echo "<i style='color: #fff;'>#</i>";
			}
			for($j = 1; $j <= 2 * $i - 1; $j++){
				echo '*';
			}
			echo '<br />';
		}
		// $i = $row -2;因为前面设置了$row = $row + 1; 而且下面的倒三角形要少一行；
		for($i = $row - 2; $i > 0; $i--){
			for($z = 1; $z < $row - $i; $z++){
				echo "<i style='color: #fff;'>#</i>";
			}
			for($j = 1; $j <= 2 * $i - 1; $j++){
				echo '*';
			}
			echo '<br />';
		}

		echo "</div>";

		

	}
?>
</html>