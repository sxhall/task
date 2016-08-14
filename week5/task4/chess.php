<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>10*10黑白棋阵</title>
	<link rel="stylesheet" type="text/css" href="./chess.css" />
</head>
<body>
	<?php
		function chess(){
			echo "<h3>10*10黑白棋阵</h3>";
			echo "<table id='tb'>";
			for($j = 1; $j <= 10; $j++){
				echo "<tr>";
				for($i = 1; $i <= 10; $i++){
					if(($i + $j) % 2 == 0){
						echo "<td style='background: #fff'></td>";
					}else{
						echo "<td style='background: #000'></td>";
					}
				}
				echo "</tr>";
			}
			echo "</table>";
		}

		chess();
	?>
</body>
</html>









