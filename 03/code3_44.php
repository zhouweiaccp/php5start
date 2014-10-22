<?php
	$arr = array('apple', 'orange', 'pear');
	
	$i = 0;
	foreach($arr as $fruit){
		echo "第" .$i. "种水果是：" .$fruit. "\n";
		$i++;
	}
	//或者
	foreach($arr as $index => $fruit)
		echo "第" .$index. "种水果是：" .$fruit. "\n";
?>
