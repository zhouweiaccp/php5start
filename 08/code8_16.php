<?php
	//打开图像
	$im = imageCreateFromPNG('dave.png');

	if ($im && imageFilter($im, IMG_FILTER_GRAYSCALE)) 
	{
    		echo '灰度处理成功！';
	    imagePNG($im, 'dave.png');
	} else {
    		echo '灰度处理失败！';
	}

	//消除内存图像
	imageDestroy($im);
?>
