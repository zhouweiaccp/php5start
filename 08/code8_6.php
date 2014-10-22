<?php
	$img = imagecreate(100, 100);

	//白色背景和蓝色文本
	$bg = imagecolorallocate($img, 255, 255, 255);
	$textcolor = imagecolorallocate($img, 0, 0, 255);

	//把字符串按行和纵向分别输出
	$string = "TaoDoor.com";
	imageString($img, 5, 0, 5, $string, $textcolor);
	imageStringUp($img, 5, 75, 98, $string, $textcolor);

	//斜着输出字符
	$chars = array("I", "L", "O", "V", "E");
	for($i=0; $i<count($chars); $i++){
		imageChar($img, 4, $i*12, 85-$i*10, $chars[$i], $textcolor);
	}

	//输出图像
	header("Content-type: image/png");
	imagepng($img);
?>
