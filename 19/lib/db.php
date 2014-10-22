<?php
	include(ROOT."lib/adodb/adodb.inc.php");		//将adodb的接口文件引入
	function getDBConnect() {						//定义获得DB连接的函数，供其它程序页使用
		global $conn;								//得到外部的$conn变量
		if(!$conn) {									//如果没有这个变量，说明没有DB连接
			$conn = &ADONewConnection('mysql');	//使用ADODB的ADONewConnection创建连接
			$conn->Connect("localhost","root","12347890","category");	//执行连接
		}
		return $conn;								//将得到的DB对象实例返回
	}
?>