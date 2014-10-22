<?php
	//ASCII字符的转换
	$str = "A 'quote' is <b>bold</b>";
	echo htmlentities($str);		//输出“A 'quote' is &lt;b&gt;bold&lt;/b&gt;”

	//转换中文字符号
	$str = "中文's Story";
	echo htmlentities($str);		//输出“&Ouml;&ETH;&Icirc;&Auml;&#039; s Story”
							//在Web页面中显示“&Ouml;&ETH;&Icirc;&Auml;'s Story”

	//正确的方法
	echo htmlentities($str, ENT_QUOTES, "GB2312");
							//输出“中文&#039;s Story”
?>
