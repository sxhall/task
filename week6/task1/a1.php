<?php
//作业1 创建数组
function odd($length){
	if($length < 1){
		echo "你输入的数字小于1";
		return false;
	}
	$a = -1;
	for($i = 0; $i < $length; $i++){
		$a += 2;
		$arr[] = $a;
	}
	return $arr;
}

$arr = odd(20);
if($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}