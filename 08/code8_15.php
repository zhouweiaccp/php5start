<?php
	//载入图片
	$filename = 'photo.png';
	$image = imageCreateFromPNG($filename);

	//旋转60度，没有覆盖到的地方使用白色
	$rotate = imageRotate($image, 60, imageColorAllocate($image, 255, 255, 255));

	//输出图像
	header('Content-type: image/jpeg');
	imageJPEG($rotate);

 	imageDestroy($rotate);
 	imageDestroy($image); 
?>
