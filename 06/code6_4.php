<?php
	//功能：将文本中的链接地址转成HTML
	//输入：字符串
	//输出：字符串
	function url2html($text)
	{
		//匹配一个URL，直到出现空白为止
		preg_match_all("/http:\/\/?[^\s]+/i", $text, $links);

		//设置页面显示URL地址的长度
		$max_size = 40;
		foreach($links[0] as $link_url)
		{
			//计算URL的长度。如果超过$max_size的设置，则缩短。
			$len = strlen($link_url);

			if($len > $max_size) 
			{
				$link_text = substr($link_url, 0, $max_size)."...";
			} else {
				$link_text = $link_url;
			}

			//生成HTML文字
			$text = str_replace($link_url,"<a href='$link_url'>$link_text</a>",$text);
		}
		return $text;
	}
	
	//运行实例
	$str = “这是一个包含多个URL链接地址的多行文字。欢迎访问http://www.taoboor.com”;
	print url2html($str);

	/*输出结果
		这是一个包含多个URL链接地址的多行文字。欢迎访问<a href='http://www.taoboor.com'>
		http://www.taoboor.com</a>
	*/
?>
