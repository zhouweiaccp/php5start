<?php
	$string = "Nothing is impossible. Just do it!";

	$just = substr($string, 23, 4);		//返回“Just”
	$just = substr($string, -11, 4);		//返回“Just”
	$center = substr($string, 11, 11);	//返回“impossible!”
	echo substr($string, -11);			//输出“Just do it!”
	echo substr($string, -1);			//输出“!”
?>
