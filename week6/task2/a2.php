<?php
//作业2 数组的截取与拼接
//创建一个连续的自然数数组
header("content-type:text/html; charset:utf-8");
function createArray($length){
	$a = 0;
	for($i = 0; $i < $length; $i++){
		$a += 1;
		$arr[] = $a;
	}
	return $arr;
}

function oprt($a, $b){
	if($a < 10){
		echo "数组的长度不能小于10，请重新输入";
		return false;
	}
	if($a < $b){
		echo "截取的长度必须小于或等于数组的长度，请重新输入";
		return false;
	}
	$arr = createArray($a); //原数组
	$arr1 = array_slice($arr, -$b); //截取数组后五项
	$arr2 = array_slice($arr, 0, -$b); //数组后五项之前的
	$arr = array_merge($arr1, $arr2);
    return $arr;
}

$result = oprt(20, 5);
if($result){
	echo "<pre>";
	print_r($result);
	echo "</pre>";
}
?>







