<?php
	$subjects = array(
     	 "Mechanical Engineering",  "Medicine",
	      "Social Science",          "Agriculture",
     	 "Commercial Science",     "Politics"
	);
	
	//匹配所有仅由有一个单词组成的科目名
	$alonewords = preg_grep("/^[a-z]*$/i", $subjects);
?>
