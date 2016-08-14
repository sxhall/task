<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>九九乘法表</title>
	<link rel="stylesheet" type="text/css" href="./multiplicationTable.css" />
</head>
<body>
	<?php
		//1.for循环九九乘法表
		//第一种形式
		echo "<h3>1.for循环的九九乘法表</h3>"; //标题
		echo "<table id='tb'>";
		for($j = 1; $j <= 9; $j++){
			echo "<tr>";
			for($i = 1; $i <= $j; $i++){
				echo "<td>";
				echo "{$i}×{$j}=".($i * $j);
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		//第二种形式
		echo "<table id='tb'>";
		for($j = 9; $j >= 1; $j--){
			echo "<tr>";
			for($i = 1; $i <= $j; $i++){
				echo "<td>";
				echo "{$i}×{$j}=".($i * $j);
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		//第三种形式
		echo "<table id='tb'>";
		for($j = 9; $j >= 1; $j--){
			echo "<tr>";
			for($z = 1; $z <= 9-$j; $z++){
				echo "<td> </td>";
			}
			for($i = 1; $i <= $j; $i++){
				echo "<td>{$i}*{$j}=".($i*$j)."</td>";
			}

			echo "</tr>";
		}
		echo "</table>";

		//第四种形式
		echo "<table id='tb'>";
		for($j = 1; $j <= 9; $j++){
			echo "<tr>";
			for($z = 1; $z <= 9 - $j; $z++){
				echo "<td> </td>";
			}
			for($i = 1; $i <= $j; $i++){
				echo "<td>{$i}*{$j}=".($i*$j)."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		

		//2.while循环九九乘法表
		echo "<h3>2.while循环九九乘法表</h3>";
		echo "<table id='tb'>";
		$j = 1;
		while($j <= 9){
			echo "<tr>";
			$i = 1;
			while($i <= $j){
				echo "<td>";
				echo "{$i}×{$j}=".($i * $j);
				echo "</td>";
				$i++;
				
			}
			echo "</tr>";
			$j++;
		}
		echo "</table>";

		//3.do...while循环九九乘法表
		echo "<h3>3.do while循环九九乘法表</h3>";
		echo "<table id='tb'>";
		$j = 1;
		do{
			echo "<tr>";
			$i = 1;
			do{
				echo "<td>";
				echo "{$i}×{$j}=".($i * $j);
				echo "</td>";
				$i++;
			}while($i <= $j);
			echo "</tr>";
			$j++;
		}while($j <= 9);

	?>
</body>
</html>









