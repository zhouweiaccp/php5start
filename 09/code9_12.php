<?php
	/*******************************************/
	/*	�ļ�����message.php		*/
	/*	���ܣ���ȡ�ż��Ľṹ��Ϣ	*/
	/*******************************************/

	//�û������������Ϣ
	$host = "pop3.163.com";
	$port = 110;
	$user = 'username';
	$pass = 'password';
	
	//��������
	$spec = sprintf("{%s:%s/pop3}INBOX", $host, $port);
	$imap = imap_open($spec, $user, $pass)
		or die('����POP3����������');
	
	//��GET��ȡuid��ֵ
	$uid  = $_GET['uid'];
	$overviews = imap_fetch_overview($imap, $uid, FT_UID);
	
	//�ʼ��Ľṹ��Ϣ
	$data = $overviews[0];
	$struct = imap_fetchstructure($imap, $uid, FT_UID);

	//ȡ�ʼ��ĵ�һ���֣�һ���һ�������ż������塣
	$pid = 1;
	$body = imap_fetchbody($imap, $uid, 1, FT_UID);
	
	//��ȡ�ʼ��ṹ�ı�Ҫ��Ϣ
	//����ʼ��ж�����֣���ʹ��$struct->parts[0]
	//����ֱ��ʹ��$struct��ֵ
	if(isset($struct->parts) && count($struct->parts))
	{
		//�ż��ı�������
		$encoding = $struct->parts[0]->encoding; 

		//�ż���MIME��������
		$subtype  = strtoupper($struct->parts[0]->subtype); 
	}
	else{
		//�ż��ı�������
		$encoding = $struct->encoding;

		//�ż���MIME��������
		$subtype  = strtoupper($struct->subtype);
	}
	
	//���룬ֻ��3��4���������Ҫת��������Ϊ��ͬ�ı�
	if($encoding == 3)
	{	
		//BASE64
		$body = imap_base64($body);
		$body = nl2br($body);
	}elseif($encodeing == 4)
	{ 
		//QUOTED-PRINTABLE
		$body = imap_qprint($body);
	}
	
	if($subtype == 'PLAIN')
		$body = htmlspecialchars($body);

	//�ر��ʼ�����������
	imap_close($imap);
?>
<html>
<head>
<title>�ʼ�����</title>
</head>
<body>
<?
	//���ͷ
	echo "<p>";
	echo "\n<br><b>�ʼ����⣺</b>".htmlspecialchars($data->subject);
	echo "\n<br><b>�� �� �ˣ�</b>".htmlspecialchars($data->from);
	echo "\n<br><b>�� �� �ˣ�</b>".htmlspecialchars($data->to);
	echo "\n<br><b>�������ڣ�</b>".htmlspecialchars($data->date);
	echo "\n<br><b>�ż���С��</b>".$data->size."�ֽ�";
	echo "\n<br><b>�ż����ݣ�</b>";
	
	//�������
	echo "<blockquote>";
	echo $body;
	echo "</blockquote>";
?>
</body>
</html>
