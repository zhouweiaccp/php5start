<?php
	//原始图像
	$src_img = imageCreateFromPNG("big.png");

	//创建图像
	$dst_img = imageCreateTrueColor(200, 200);

	//剪切图像
	imageCopy ($dst_img, $src_img, 0, 0, 50, 50, 200, 200);

	//生成剪切后的图像
	imagePNG($dst_img, "small.png");

	//销毁内存中的图像
	imageDestroy($dst_img);
	imageDestroy($src_img);
?>
