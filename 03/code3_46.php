<?php
	$arr = array ('one', 'two', 'three', 'four', 'five', 'six');

	while (list ($index, $value) = each ($arr)) {
		if (!($index % 2)) {	 			//跳过键名为奇数值的元素
        		continue;
		}
		echo $value;					//输出当前元素
	}
?>
