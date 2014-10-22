<?php
	$rs = fopen("photo.jpeg", "rb");				//使用二进制读图片文件
	$data = "";
	while($str = fread($rs, 1024))
	{
		$data .= $str;
	}

	$img = imageCreateFromString($data);		//由二进制字符串创建图片
	if ($img !== false)
	{
		//生成格式转换后的图像
		imagePNG($img, "photo.png");

		echo 'JPEG格式转换为PNG格式。';
	} else {
		echo '图像格式转换错误！';
	}
?>
