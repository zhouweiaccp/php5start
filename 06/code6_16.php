<?php
  //�ļ�����UBBCode.php
  //���ܣ�UBBCodeת��ΪHTML 
  //���룺�ַ���
  //������ַ���
  function converUBB( $strCode )
  {
	//ģʽ
	$pattern = array(
		/* ������ʽ */
		"/\[b\](.+?)\[\/b\]/is",
		"/\[u\](.+?)\[\/u\]/is",
		"/\[i\](.+?)\[\/i\]/is",

		/* �����ʽ */
		"/\[font=([ ,\w\x7f-\xff]+?)\](.+?)\[\/font\]/is",
		"/\[color=([a-z]{3,}|#?[0-9a-f]{6})\](.+?)\[\/color\]/is",
		"/\[size=([+-]?\d{1,2})\](.+?)\[\/size\]/is",

		/* �����ʼ���ַ��ʽ */
		"/\[email=([.a-z]+?@[.a-z]+?)\](.+?)\[\/email\]/is",
		"/\[email\]([.a-z]+?@[.a-z]+?)\[\/email\]/is",

		/* URL���ӵ�ַ��ʽ */
		"/\[url=(.+?)\](.+?)\[\/url\]/is",
		"/\[url\]www\.(.+?)\[\/url\]/is",
		"/\[url\](.+?)\[\/url\]/is",

		/* �������ø�ʽ */
		"/\[fly\](.+?)\[\/fly\]/is",						//�ƶ���������ʽ
		"/\[align=(left|center|right)\](.+?)\[\/align\]/is",	//��������ʽ
		"/\[code\](.+?)\[\/code\]/is",					//�����ʽ
	);

	//�滻����
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
		'<blockquote><b>����:</b><hr color=#990000>\\1<hr color=#990000></blockquote>',
	);

	//�����滻
	$string = preg_replace($pattern, $replacement, $strCode);

	//���ؽ��
	return $string;
  }
?>
