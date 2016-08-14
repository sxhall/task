<?php
//作业三 字符串转换
header("content-type:text/html; charest:utf-8");
function change($str){
	$arr = explode("_", $str); //将一个字符串用分割符转变为一数组形式
	foreach($arr as $value){
		$tmp = ucfirst($value);
		$tarr[] = $tmp; 
	}
	$tarr = implode("", $tarr); //将数组用特定的分割符转变为字符串
	echo $tarr;
}

$str = "close_door";
echo $str."<br />";

change($str);
?>