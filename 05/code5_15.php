<?php
	$input = array ('a', 'b', 'c');
	$result = array_pad ($input, 5, 'X');	  //����ǣ�array ('a', 'b', 'c', 'X', 'X')

	$result = array_pad ($input, -6, 'y');	  //����ǣ�array ('y', 'y', 'y', 'a', 'b', 'c')

	$result = array_pad ($input, 2, 'z');	  //û���κ����
?> 
