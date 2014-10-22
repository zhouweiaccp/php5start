<?php
	$string = 'http://movie.welcome-to-China.com';
	$change = array('com'=>'net', 'http'=>'https');
	echo strtr($string, $change);		
	
	/* 输出结果为：
		https://movie.welnete-to-China.net
	*/
?>
