<?php
	$subjects = array(
     	 "Mechanical Engineering",  "Medicine",
	      "Social Science",          "Agriculture",
     	 "Commercial Science",     "Politics"
	);
	
	//ƥ�����н�����һ��������ɵĿ�Ŀ��
	$alonewords = preg_grep("/^[a-z]*$/i", $subjects);
?>
