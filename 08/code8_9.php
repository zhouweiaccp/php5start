<?php
	//功能：打开一个图片文件
	//输入：图片文件名
	//输出：图片
	function LoadGif($imgname)
	{
		//尝试打开GIF图像
		$img = @imageCreateFromGIF($imgname); 

		if(!$img)		 //如果打开失败
		{ 
			//创建空文件
			$img = imageCreateTrueColor(200, 50); 
			$bgc = imageColorAllocate($img, 255, 255, 255);
			$stc = imageColorAllocate($img, 0, 0, 0);

			//填充矩形
			imageFilledRectangle($img, 0, 0, 200, 50, $bgc);

			//输出错误信息
			imageString($img, 1, 5, 5, "Error loading $imgname", $stc);
		}
		return $img;
	}

	//测试范例
	$img = LoadGif("photo.gif");						//本地文件
	$img = LoadGif("http://taodoor.com/photo.gif");			//远程文件
?>
