<?php
	$x = 15;
	echo $x++;			//输出15，先返回后自加
	$y = 20;
	echo ++$y;			//输出21，先自加后返回
						//至此，$x=16，$y=21
	$z1 = ($x+$y)--;		//$z1为37，而不是36
	$z2 = --($x+$y);		//$z2为36
?>
