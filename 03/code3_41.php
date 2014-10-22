<?php
	$arr = array('apple', 'orange', 'pear');

	reset($arr);						//重置数组指针的位置
	while(list($index, $fruit) = each($arr)){
		echo "第" .$index. "种水果是：" .$fruit. "\n";
	}
?>
