<?php
	/* 使用松散的“==”或“!=”比较 */
	$str = "123";
	var_dump ($str == 123);			//结果为true
	var_dump ($str == true);			//结果为true
	var_dump ($str != null);			//结果为true

	$zero = "0";
	var_dump ($zero == true);			//结果为false
	var_dump ($zero == false);		//结果为true

	var_dump ("0" == 0);				//结果为true
	var_dump ("0" == null);			//结果为false，"0"被认为是一个字符串
	var_dump (0 == null);			//结果为true，数字0即NULL

	/* 使用严格的“===”或“!==”比较 */
	var_dump ("0" === 0);			//结果为false，字符串和数字，类型不同
	var_dump (TRUE === true);		//结果为true，“真”或“假”并不区分大小写
	var_dump (10/2.0 !== 5);			//结果为true，10/2.0返回5.0是一个浮点数
?>
