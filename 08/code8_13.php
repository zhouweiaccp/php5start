<?php
	//绘制椭圆形
	$dst_img = imageCreateTrueColor (200, 200);

	imageFilledRectangle($dst_img, 0, 0, 200, 200, 
				imageColorAllocate($dst_img, 255, 255, 255));

	$dst_blue = imageColorAllocate($dst_img, 0, 0, 255);

	imageFilledEllipse($dst_img, 100, 100, 180, 140, $dst_blue);

	//绘制三角形
	$src_img = imageCreateTrueColor (200, 200);

	imageFilledRectangle($src_img, 0, 0, 200, 200, 
				imageColorAllocate($src_img, 255, 255, 255));

	$src_red = imageColorAllocate($src_img, 255, 0, 0);

	imageFilledPolygon($src_img, array(100, 20, 180, 180, 20, 180), 3, $src_red);

	//图像的合并
	imageCopyMerge($dst_img, $src_img, 0, 0, 0, 0, 200, 200, 75);
	
	//生成PNG图片
	header("Content-type: image/png");
	imagePNG($dst_img);

	//消除内存图像
	imageDestroy($dst_img);
	imageDestroy($src_img);
?>
