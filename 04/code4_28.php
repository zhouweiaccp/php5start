<?php
	//ASCII�ַ���ת��
	$str = "A 'quote' is <b>bold</b>";
	echo htmlentities($str);		//�����A 'quote' is &lt;b&gt;bold&lt;/b&gt;��

	//ת�������ַ���
	$str = "����'s Story";
	echo htmlentities($str);		//�����&Ouml;&ETH;&Icirc;&Auml;&#039; s Story��
							//��Webҳ������ʾ��&Ouml;&ETH;&Icirc;&Auml;'s Story��

	//��ȷ�ķ���
	echo htmlentities($str, ENT_QUOTES, "GB2312");
							//���������&#039;s Story��
?>
