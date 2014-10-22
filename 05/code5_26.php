<?php
	$fruits = array ("lemon", "orange", "banana", "apple");
	sort ($fruits);				//正序排列
	echo "<p>正序排列：";
	echo join(", ", $fruits);
	/* 输出结果为“正序排列：apple, banana, lemon, orange”*/

	rsort ($fruits);				//逆序排列
	echo "<p>逆序排列：";
	echo join(", ", $fruits);
	/* 输出结果为“逆序排列：orange, lemon, banana, apple”*/
?>
