<?php
	function change_data(&$string)				//�����ô���
	{
	    	$string .= ' We changed something.';
	}
	$str = 'This is original string.' ;
	change_data($str);
	echo $str;								//�����This is original string. We changed something.��
?>
