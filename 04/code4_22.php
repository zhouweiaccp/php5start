<?php
	$string = 'http://movie.welcome-to-China.com';
	$change = array('com'=>'net', 'http'=>'https');
	echo strtr($string, $change);		
	
	/* ������Ϊ��
		https://movie.welnete-to-China.net
	*/
?>
