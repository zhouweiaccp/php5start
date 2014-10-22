<?php
	$date = "08/30/2006";
	
	//分隔符可以是斜线，点，或横线
	list($month, $day, $year) = split ('[/.-]', $date);
	
	//输出为另一种时间格式
	echo "Month: $month; Day: $day; Year: $year<br />\n";
?>
