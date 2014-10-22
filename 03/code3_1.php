<html>
<head><title>简单的PHP程序</title></head>
<body>
<?php
	define("MAX_LINE_NUM", 4);				//定义最大的行数
	$title = "<h1>Hello, PHP World!</h1>\n";		//初始化一个字符串

	echo $title;							//打印一行文字“\n”将输出换行符

	//循环输出星号
	echo "<pre>\n";
	for($i=1; $i<=MAX_LINE_NUM; $i++)
	{
		echo print_star($i);
		echo "\n";
	}
	echo "</pre>\n";
	
	/**
	 * 函数功能：打印指定数目的星号“*”
	 * 参数：$num  打印星号的数量
	 * 返回：字符串
	 */
	function print_star($num)
	{
		return str_repeat("*", $num);			//重复输出$num个“*”
	}
?>
</body>
</html>
