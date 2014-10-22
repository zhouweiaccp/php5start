<?php
	$var = "Hello, PHP World!"; 	//一个函数外部的变量
	function TestVar(){
		echo $var; 			//使用一个函数内部的变量
	}
	TestVar ();				//输出空
	echo $var;				//输出“Hello, PHP World!”
?>
