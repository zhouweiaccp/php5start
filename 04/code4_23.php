<?php
	//日期的表示
	$date = sprintf("%04d-%02d-%02d", 2006, 9, 3);		//返回“2006-09-03”
	
	//价格的表示
	$money1 = 1038.45;
	$money2 = 2154.75;
	$sum_money = sprintf("%01.2f￥", $money1 + $money2);	//返回“3193.20￥”
	
	//整数和字符串
	$format = "There are %d dogs in the %s.";
	printf($format, "5.1", "my room");  	//输出“There are 5 dogs in the my room.”
	
	//一个百分比
	printf("%.2f%%", 32.1);			//输出“32.10%”

	//十进制和十六进制
	$num = 1234;
	printf("The hex value of %d is %X", $num, $num); 
								//输出“The hex value of 1234 is 4D2”
?>
