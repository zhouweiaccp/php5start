<?php
	//���ʼ�POP3����������
	$mbox = imap_open("{localhost:110/pop3}INBOX"��"usr"��"pwd");
	//��ȡ�ʼ�����
	$message = imap_fetchbody($mbox��$uid, 1, FT_UID);
	//�ر��ʼ�������
	imap_close($mbox);
	//����ʼ�����
	echo $message;
?>
