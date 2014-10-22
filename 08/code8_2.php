<?php
	//创建图像
	$img = imageCreate (300, 200);
	$background = ImageColorAllocate($img, 255, 255, 255);			//背景设为白色
	$black = ImageColorAllocate ($img, 0, 0, 0);		  			//设定黑色
	$white = $background;									//设定白色

	//发送标头信息
	header("Content-type: image/png");

	//绘制矩形
	imageRectangle($img, 30, 30, 180, 120, $black);
	imageRectangle($img, 60, 60, 210, 150, $black);

	//填充颜色
	imageFill ($img, 100, 100,$black);

	//输出文字
	imageString ($img, 5, 75, 81, "Hello, PHP", $white);

	//输出PNG图像
	imagePNG($img);

	//销毁图像
	imageDestroy($img);
?>

