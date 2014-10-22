<?php
  /**********************************/
  /*    文件名：ubbcode.inc.php     */
  /*    说明：UBBCode解析函数       */
  /**********************************/

  //功能：UBBCode转换为HTML 
  //输入：字符串
  //输出：字符串
  function ubbcode($d)
  {
	$pattern = array(
		"/\[b\](.+?)\[\/b\]/is",
		"/\[i\](.+?)\[\/i\]/is",
		"/\[u\](.+?)\[\/u\]/is",
		"/\[font=([^\[]*)\](.+?)\[\/font\]/is",
		"/\[color=([#0-9a-z]{1,10})\](.+?)\[\/color\]/is",
		"/\[size=([0-9]{1,2})\](.+?)\[\/size\]/is",
		"/\[email=([^\[]*)\](.+?)\[\/email\]/is",
		"/\[email\]([^\[]*)\[\/email\]/is",
		"/\[url=([^\[]*)\](.+?)\[\/url\]/is",
		"/\[url\]www\.([^\[]*)\[\/url\]/is",
		"/\[url\]([^\[]*)\[\/url\]/is",
		"/\[fly\](.+?)\[\/fly\]/is",
		"/\[move\](.+?)\[\/move\]/is",
		"/\[align=(left|center|right)\](.+?)\[\/align\]/is",
		"/\[shadow=([#0-9a-z]{1,10})\,([0-9]{1,3})\,([0-9]{1,2})\](.+?)\[\/shadow\]/is",
		"/\[glow=([#0-9a-z]{1,10})\,([0-9]{1,2})\](.+?)\[\/glow\]/is",
		"/\[code\](.+?)\[\/code\]/is",
		"/\[list\](.+?)\[\/list\]/Uis",
		"/\[list=([aA1iI])\](.+?)\[\/list\]/Uis",
		"/\[\*\](.*?)/i",
	);

	$replacement = array(
		'<b>\\1</b>',
		'<i>\\1</i>',
		'<u>\\1</u>',
		'<font face="\\1">\\2</font>',
		'<font color="\\1">\\2</font>',
		'<font size="\\1">\\2</font>',
		'<img src=images/Emaillink.gif title="电子邮件" 
				align=absmiddle border=0 height=14> <a href="mailto:\\1">\\2</a>',
		'<img src=images/Emaillink.gif title="电子邮件"
				align=absmiddle border=0 height=14> <a href="mailto:\\1">\\1</a>',
		'<img src=images/Hyperlink.gif title="超级链接"
				align=absmiddle border=0 height=14> <a href="\\1" target=_blank>\\2</a>',
		'<img src=images/Hyperlink.gif title="超级链接"
				align=absmiddle border=0 height=14> <a href="http://www.\\1\" target=_blank>\\1</a>',
		'<img src=images/Hyperlink.gif title="超级链接"
				align=absmiddle border=0 height=14> <a href="\\1" target=_blank>\\1</a>',
		'<marquee width=90% behavior=alternate scrollamount=3>\\1</marquee>',
		'<marquee scrollamount=3>\\1</marquee>',
		'<div align=\\1>\\2</div>',
		'<table width=*><tr>
			<td style="filter:shadow(color=\\1, direction=\\2 ,strength=\\3)">\\4</td></tr></table>',
		'<table width=*><tr><td style="filter:glow(color=\\1, strength=\\2)">\\3</td></tr></table>',
		'<blockquote><img src=images/Script.gif title="代码" align=absmiddle border=0 height=14>
			 <b>代码:</b>
		<hr color=#990000><font face="Courier New">\\1</font><hr color=#990000></blockquote>',
		'<ul>\\1</ul>',
		'<ol type=\\1>\\2</ol>',
		'<li>\\1</li>',
	);
	$d = stripslashes($d);
	$d = preg_replace($pattern,$replacement,$d);

	//图像和FLASH
	$d = preg_replace
		 (
			"/\[img\]\s*(http:\/\/\S+?)\s*\[\/img\]/is", 
			"<a href=\\1 target=_blank title=\"贴图：点击放大查看\"><img src=\\1 border=0 onload=\"javascript:if(this.width>520)this.width=520;\"></a>", 
			$d
		 );	

	//FLASH
	$d = preg_replace
		 (
			"/\[flash\]\s*(http:\/\/\S+?)\s*\[\/flash\]/is",
     		'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="80%" codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0><param name="movie" value="\\1"><param name="quality" value="high"><embed src="\\1" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="80%"></embed></object>',
     		$d
     	 );

	return $d;
  }

?>
