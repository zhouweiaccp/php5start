<?php
	//打开图像
	$im = imageCreateFromPNG('sean.png');

	if ($im && imageFilter($im, IMG_FILTER_GAUSSIAN_BLUR)) 
	{
	    echo '亮度改变成功！';
	    imagePNG($im, 'sean.png');
	}else{
	    echo '亮度改变失败！';
	}

	//消除内存图像
	imageDestroy($im);
?>
