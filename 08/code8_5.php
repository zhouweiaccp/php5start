<?php
	//创建图像
	$image   = imageCreate(400, 200);
	$white  = imageColorAllocate($image, 0xFF, 0xFF, 0xFF);
	$navy   = imageColorAllocate($image, 0x00, 0x00, 0x80);
	$red    = imageColorAllocate($image, 0xFF, 0x00, 0x00);

	//中心点
	$cx = 200;
	$cy = 100;

	//绘制弦面
	imageFilledArc($image, $cx, $cy, 200, 120, 30, 150 , $red, IMG_ARC_PIE);
	imageFilledArc($image, $cx, $cy, 200, 120, 30, 150 , $white, IMG_ARC_CHORD);

	//绘制轮廓
	imageFilledArc($image, $cx, $cy, 200, 120, 150, 390, $navy, 
				 IMG_ARC_PIE + IMG_ARC_EDGED + IMG_ARC_NOFILL);

	//绘制圆环
	imageFilledEllipse($image, $cx-50, $cy-50, 60, 40, $red);
	imageFilledEllipse($image, $cx-50, $cy-50, 20, 20, $white);

	//绘制矩形面
	imageFilledRectangle($image, $cx+30, $cy-75, $cx+70, $cy-25, $red);
	imageFilledEllipse($image, $cx+50, $cy-50, 20, 20, $white);

	//输出PNG图片
	header('Content-type: image/png');
	imagepng($image);

	//销毁图像
	imageDestroy($image);
?>
