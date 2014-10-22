<?php
	function StaticVar(){
		static $var = 0;			//定义一个静态变量，并赋初值为0
		$var = $var + 1;
		echo $var;			//输出结果
	}
	StaticVar();				//第一次运行，输出1
	StaticVar();				//第二次运行，输出2
	StaticVar();				//第三次运行，输出3
?>
