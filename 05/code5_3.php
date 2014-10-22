<?php
	$var_array = array (
		"apple",
		"PI"=>"3.14", 
		"num"=>1000, 
		array('a','b'),
	);
	if (in_array ("apple", $var_array))			//字符串的比较
	{
	    print "字符串\n";
	}
	if (in_array (3.14, $var_array, true))			//数字的比较，严格地
	{
	    print "圆周率\n";
	}
	if (in_array (array("b","a"), $var_array))		//数组的比较
	{
	    print "数组\n";
	}
?>
