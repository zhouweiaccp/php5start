<?php
	//���ͷ��Ϣ
	header("Content-type:text/xml;");

	//���µ�����
	$articles = array
	(
		1 => array	(
			'title'	=> '���±���1',
			'description' => '�������±���1���ݵ�������',
			'author' => '����1',
			'pubDate' => 'Thu, 12 Oct 2006 05:22:21 GMT',
		),
		2 => array(
			'title'	=> '���±���2',
			'description' => '�������±���1���ݵ�������',
			'author' => '����2',
			'pubDate' => 'Thu, 12 Oct 2006 05:02:31 GMT',
		),
		3 => array(
			'title'	=> '���±���2',
			'description' => '�������±���1���ݵ�������',
			'author' => '����2',
			'pubDate' => 'Thu, 12 Oct 2006 05:02:31 GMT',
		),
	);

	//��ʼ����RSS�ļ�
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?" . ">\r\n";
	echo "<?xml-stylesheet type=\"text/css\" href=\"rsstyle.css\"?" . ">\r\n";
	echo "<rss version=\"2.0\">\r\n";
	echo "<ttl>".count($articles)."</ttl>\r\n";

	//����ѭ�����
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
