<?php
//作业5 自学array_multisort()函数，来进行排序
function mulsort($arr){
	if(!is_array($arr)){
		echo "输入的不是数组";
		return false;
	}

	if(count($arr) < 1){
		echo "数组不能为空";
		return false;
	}

	$keys = array_keys($arr); //获取数组的键值
	$vals = array_values($arr); //获取数组的值
	array_multisort($vals, $keys); //先$vals排序，排序同行列式的行变化
	$arr = array_combine($keys, $vals); //合并两个数组为一个新数组

	return $arr;
}

$arr = array("d"=>100, "b"=>23, "c"=>22, "f"=>22, "e"=>22);
echo "排序前的数组<br />";
print_r($arr);
echo "<br />";

$result = mulsort($arr);
if($result){
	echo "排序后的数组<br />";
	print_r($result);
}
