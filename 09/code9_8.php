<?php
	//������
	$imap = imap_open("{localhost:110/pop3}INBOX", "usr", "pwd");
	//�������
	$inbox = imap_check($imap);
	//����ʼ��б�
	$sequence = "1:{$inbox->Nmsgs}";
	$overviews = imap_fetch_overview($imap, $sequence);
	//�ر�����
	$imap_close($imap);
?>
