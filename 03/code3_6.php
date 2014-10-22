<?php
	$coffee = 'Nescafe';
	echo "$coffee's taste is nice.";		//正常，“'”不会作为一个的变量名标识符
	echo "I drank some $coffees.";		//无效的$coffees，“s”也是变量名标识符
	echo "I drank some ${coffee}s.";	//有效的
	echo "I drank some {$coffee}s.";	//有效的
?>
