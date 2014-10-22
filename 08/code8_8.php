<?php
	$text = "中文字体，Hello PHP！";
	$font = "simsun.ttc";		 	//指定字体，如“宋体”

	$p = imagettfbbox (20, 0, $font, $text);
	echo "左下（$p[0]，$p[1]） ";
	echo "右下（$p[2]，$p[3]） ";
	echo "右上（$p[4]，$p[5]） ";
	echo "左上（$p[6]，$p[7]） ";
	
	/* 输出结果如下：
	 左下（1，4）
	 右下（263，4）
	 右上（263，-23）
	 左上（1，-23）
	*/
?>
