<?php
	define("MAX_WIDTH_PIXEL", 600);
	define("MAX_HEIGHT_PIXEL", 240);

	//发送标头信息
	header("Content-type: image/gif");

	//建立图像
	$img = imageCreate(MAX_WIDTH_PIXEL, MAX_HEIGHT_PIXEL);

	//设定颜色
	$white = imageColorAllocate($img, 255, 255, 255);
	$red = imageColorAllocate($img, 255, 0, 0);
	$blue = imageColorAllocate($img, 0, 0, 255);
	$brown = imageColorAllocate($img, 100, 0, 0);
	$black = imageColorAllocate($img, 0, 0, 0);

	$width  = MAX_WIDTH_PIXEL/2;				//宽度
	$height = MAX_HEIGHT_PIXEL/2;				//高度

	//建立坐标轴
	imageLine($img, $width, 0, $width, MAX_HEIGHT_PIXEL, $black);
	imageLine($img, 0, $height, MAX_WIDTH_PIXEL, $height, $black);

	//通过循环来实现函数图形的描绘
	for($i=0; $i<=MAX_WIDTH_PIXEL; $i++)
	{
		$y1 = 100 * sin($i/100 * M_PI);
		imageSetPixel($img, $i, $height+$y1, $blue);

		$y2 = 100 * sin($i/300 * M_PI);
		imageSetPixel($img, $i, $height+$y2, $red);

		$y3 = 100 * sin($i/300 * M_PI);
		imageSetPixel($img, $i, $height-$y3, $brown);
	}

	//显示图形
	imageGif($img);

	//释放资源
	imageDestroy($img);
?>
