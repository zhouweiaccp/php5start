<?php
	$input = array ('a', 'b', 'c');
	$result = array_pad ($input, 5, 'X');	  //结果是：array ('a', 'b', 'c', 'X', 'X')

	$result = array_pad ($input, -6, 'y');	  //结果是：array ('y', 'y', 'y', 'a', 'b', 'c')

	$result = array_pad ($input, 2, 'z');	  //没有任何填充
?> 
