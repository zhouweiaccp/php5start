<?php
	//��ѯ�ַ�
	$search = array(
		"<",
		">",
		"\"",
		"*",		//��$replace���޶�Ӧ��
	);

	//����ַ�
	$replace = array(
		"&lt;",
		"&gt;",
		"&quot;",
	);
	
	//�ַ���
	$string = '<a href="links.php">��*��*��*ַ</a>';

	echo str_replace($search, $replace, $string);

	/* ������
		&lt;a href=&quot;links.php&quot;&gt;&���ӵ�ַ&lt;/a&gt;
	*/
?>
