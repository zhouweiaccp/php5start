<?php
	//指定的图像
	$filename = 'photo.png';

	//获得图像的尺寸
	list($width, $height) = getImageSize($filename);

	//新图像的大小
	$new_width = $width * 0.5;
	$new_height = $height * 0.5;

	//生成所略图
	$image_d = imageCreateTrueColor ($new_width, $new_height);
	$image_s = imageCreatefromPNG ($filename);
	imageCopyResampled ($image_d, $image_s, 0, 0, 0, 0,
						$new_width, $new_height, $width, $height);

	//输出JPEG图像
	header ('Content-type: image/jpeg');
	imageJPEG($image_d, null, 99);			//实现99%压缩
?>
