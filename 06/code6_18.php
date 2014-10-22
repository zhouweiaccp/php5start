<?php
	//被请求文件名的匹配
	$filename = "\/[^\/]+\.(php|html|htm)\??";

	//将文件名放在引号之内，“.*”表示文件名两端的其余信息
	$pattern  = "/\".*"  . $filename.  ".*\"/i";
	preg_match($pattern, $logline);
?>
