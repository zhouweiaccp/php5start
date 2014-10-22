<?php
	//定义PNG图片的高和宽
	$widht =501;
	$height=201;

	//创建图片
	$image=imageCreate($widht, $height);

	//定义颜色
	$colorWhite=imageColorAllocate($image, 255, 255, 255);
	$colorGrey=imageColorAllocate($image, 192, 192, 192);
	$colorBlue=imageColorAllocate($image, 0, 0, 255);
	$colorRed =imageColorAllocate($image, 255, 0, 0);
	
	//创建包围在图片周围的线
	for ($i=0; $i<=30; $i++)
	{
		imageline($image, 0, $i*20, 500, $i*20, $colorGrey);
		imageline($image, $i*20, 0, $i*20, 200, $colorGrey);
	}

	//绘制多边形
	$graphValues=array(1,142,45,190,80,181,120,105,23,13,150,55);
	imagePolygon($image, $graphValues, 6, $colorBlue);

	//绘制弧形
	imageArc($image, 250, 100, 200, 150, 40, 320, $colorRed);

	//绘制圆形
	imageEllipse($image, 400, 100, 179, 179, $colorBlue);

	//设定图形的线宽，并绘制矩形
	imageSetThickness($image, 3);
	imageRectangle($image, 250, 52, 400, 146, $colorRed);

	//输出PNG图形
	header("Content-type: image/png");
	imagePNG($image);

	//销毁资源
	imageDestroy($image);
?>
