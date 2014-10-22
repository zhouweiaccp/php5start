<?php
	//输出头信息
	header("Content-type:text/xml;");

	//文章的数组
	$articles = array
	(
		1 => array	(
			'title'	=> '文章标题1',
			'description' => '这是文章标题1内容的描述。',
			'author' => '作者1',
			'pubDate' => 'Thu, 12 Oct 2006 05:22:21 GMT',
		),
		2 => array(
			'title'	=> '文章标题2',
			'description' => '这是文章标题1内容的描述。',
			'author' => '作者2',
			'pubDate' => 'Thu, 12 Oct 2006 05:02:31 GMT',
		),
		3 => array(
			'title'	=> '文章标题2',
			'description' => '这是文章标题1内容的描述。',
			'author' => '作者2',
			'pubDate' => 'Thu, 12 Oct 2006 05:02:31 GMT',
		),
	);

	//开始构造RSS文件
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?" . ">\r\n";
	echo "<?xml-stylesheet type=\"text/css\" href=\"rsstyle.css\"?" . ">\r\n";
	echo "<rss version=\"2.0\">\r\n";
	echo "<ttl>".count($articles)."</ttl>\r\n";

	//遍历循环输出
	if(is_array($articles))
	{
		foreach($articles as $item)
		{
			echo "<item>\r\n";
			echo "	<title>" .htmlspecialchars($item['title']) ."</title>\r\n";
			echo "	<description><![CDATA["
					.htmlspecialchars($item['description'])
					."]]></description>\r\n";
			echo "	<author>" .htmlspecialchars($item['author']) ."</author>\r\n";
			echo "	<pubDate>" .htmlspecialchars($item['pubDate']) ."</pubDate>\r\n";
			echo "</item>\r\n";
		}
	}
	echo "</rss>\r\n";
?>
