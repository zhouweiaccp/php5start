<?php
  //文件名：UBBCode.php
  //功能：UBBCode转换为HTML 
  //输入：字符串
  //输出：字符串
  function converUBB( $strCode )
  {
	//模式
	$pattern = array(
		/* 基本样式 */
		"/\[b\](.+?)\[\/b\]/is",
		"/\[u\](.+?)\[\/u\]/is",
		"/\[i\](.+?)\[\/i\]/is",

		/* 字体格式 */
		"/\[font=([ ,\w\x7f-\xff]+?)\](.+?)\[\/font\]/is",
		"/\[color=([a-z]{3,}|#?[0-9a-f]{6})\](.+?)\[\/color\]/is",
		"/\[size=([+-]?\d{1,2})\](.+?)\[\/size\]/is",

		/* 电子邮件地址格式 */
		"/\[email=([.a-z]+?@[.a-z]+?)\](.+?)\[\/email\]/is",
		"/\[email\]([.a-z]+?@[.a-z]+?)\[\/email\]/is",

		/* URL链接地址格式 */
		"/\[url=(.+?)\](.+?)\[\/url\]/is",
		"/\[url\]www\.(.+?)\[\/url\]/is",
		"/\[url\](.+?)\[\/url\]/is",

		/* 其他常用格式 */
		"/\[fly\](.+?)\[\/fly\]/is",						//移动的字体样式
		"/\[align=(left|center|right)\](.+?)\[\/align\]/is",	//字体对齐格式
		"/\[code\](.+?)\[\/code\]/is",					//代码格式
	);

	//替换数组
	$replacement = array(
		'<b>\\1</b>',
		'<u>\\1</u>',
		'<i>\\1</i>',
		'<font face="\\1">\\2</font>',
		'<font color="\\1">\\2</font>',
		'<font size="\\1">\\2</font>',
		'<a href="mailto:\\1">\\2</a>',
		'<a href="mailto:\\1">\\1</a>',
		'<a href="\\1" target=_blank>\\2</a>',
		'<a href="http://www.\\1\" target=_blank>\\1</a>',
		'<a href="\\1" target=_blank>\\1</a>',
		'<marquee width=90% behavior=alternate scrollamount=3>\\1</marquee>',
		'<div align=\\1>\\2</div>',
		'<blockquote><b>代码:</b><hr color=#990000>\\1<hr color=#990000></blockquote>',
	);

	//进行替换
	$string = preg_replace($pattern, $replacement, $strCode);

	//返回结果
	return $string;
  }
?>
