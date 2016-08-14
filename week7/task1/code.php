<?php
function code($w = 200, $h = 100, $n = 4){

	//随机产生一张图片
	$img = imagecreatetruecolor($w, $h);
	$color = imagecolorallocate($img, rand(128, 255), rand(128, 255), rand(128, 255));
	imagefill($img, 0, 0, $color);

	//在图片上添加一些干扰元素
	for($i = 0; $i < 100; $i++){
		$x = rand(0, $w);
		$y = rand(0, $h);
		$color = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
		imagesetpixel($img, $x, $y, $color);

		//添加一线干扰的线条
		if($i % 10 == 0){
			$startX = rand(0, $w);
			$startY = rand(0, $h);
			$endX = rand(0, $w);
			$endY = rand(0, $h);
			imageline($img, $startX, $startY, $endX, $endY, $color);
		}
	}

	//添加验证码
	$str = "abcdefghijkmnpqrstABCDEFGGJKLMN123456789";
	$len = strlen($str);
	$code = "";
	for($i = 0; $i < $n; $i++){
		$index = rand(0, $len - 1); //字符索引：找到字符串里面的每个字符对应的下标
		$code .= $str[$index];
	}
	$fontsize = ceil(($w - 20) / $n); //设置字体的大小，即所占的高度
	$y = ceil($h / 2 + $fontsize / 2);
	imagettftext($img, $fontsize, 0, 20, $y, $color, "./1.ttf", $code);

	header("content-type: image/png");
	imagepng($img);

}

code();

