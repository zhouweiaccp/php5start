<?php
	function change_data(&$string)				//按引用传递
	{
	    	$string .= ' We changed something.';
	}
	$str = 'This is original string.' ;
	change_data($str);
	echo $str;								//输出“This is original string. We changed something.”
?>
