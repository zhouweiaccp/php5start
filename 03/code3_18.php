<?php
	$real_num = 3.1e9;				//定义一个超过整型范围的数
								//整型的最大值约是2.147e9即231
	echo $real_num;				//输出3100000000，一个浮点数
	echo (int) $real_num;			//输出一个不确定的值，如：-1194967296
?>
