<?php
	//查询字符
	$search = array(
		"<",
		">",
		"\"",
		"*",		//在$replace中无对应项
	);

	//替代字符
	$replace = array(
		"&lt;",
		"&gt;",
		"&quot;",
	);
	
	//字符串
	$string = '<a href="links.php">链*接*地*址</a>';

	echo str_replace($search, $replace, $string);

	/* 输出结果
		&lt;a href=&quot;links.php&quot;&gt;&链接地址&lt;/a&gt;
	*/
?>
