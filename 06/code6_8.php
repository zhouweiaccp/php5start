<?php
	$date = "08/30/2006";
	
	//�ָ���������б�ߣ��㣬�����
	list($month, $day, $year) = split ('[/.-]', $date);
	
	//���Ϊ��һ��ʱ���ʽ
	echo "Month: $month; Day: $day; Year: $year<br />\n";
?>
