<?php
	/* 在浏览器中输入“http://localhost/test.php?action=test&foo[]=hello&foo[]=world”
	   这时$_SERVER["QUERY_STRING"] = "action=test&foo[]=hello&foo[]=world"
	*/
	
	//第一种方式，作用域在函数内部
	function test()
	{
		parse_str($_SERVER["QUERY_STRING"]);
		echo $action. "<br>";				//输出“test”
		if(define($foo)){
		echo $foo[1] . "<br>";			//输出“hello”
		echo $foo[2] . "<br>";			//输出“world”
		}
	}
	test();
	
	//使用第二中方式，将变量解析到给定的数组中
	parse_str($_SERVER["QUERY_STRING"], $arr);
	echo $arr['action'];				//输出“test”
	echo $arr['foo'][0];				//输出“hello”
	echo $arr['foo'][1];				//输出“world”
?>
