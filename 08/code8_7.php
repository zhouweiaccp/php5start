<?php
	header("Content-type: image/jpeg");
	$img = imageCreateTrueColor(300, 35);

	//指定颜色
	$white = imageColorAllocate ($img, 255, 255, 255);
	$grey = imageColorAllocate ($img, 100, 100, 100);
	$black = imageColorAllocate ($img, 0, 0, 0);
	imageFilledRectangle ($img, 0, 0, imagesX($img)-1, imagesY($img)-1, $white);

	$text = "中文字体，Hello PHP！";
	$font = "simsun.ttc";		 	//指定字体，如“宋体”

	//添加一个阴影
	imageTtfText ($img, 20, 0, 12, 27, $grey, $font, $text);

	//添加一个字体，在阴影之上
	imageTtfText ($img, 20, 0, 10, 25, $black, $font, $text);

	imageJPEG ($img);
	imageDestroy ($img);
?>
