<?php
	$var = "Hello, World!"; 		//定义一个全局变量
	function TestVar(){
		global $var;			//声明一个全局变量
		echo $var;			//输出
	}
	TestVar();					//输出为“Hello, World!”
?>
