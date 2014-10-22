<?php
	//打开连接
	$imap = imap_open("{localhost:110/pop3}INBOX", "usr", "pwd");
	//检查邮箱
	$inbox = imap_check($imap);
	//获得邮件列表
	$sequence = "1:{$inbox->Nmsgs}";
	$overviews = imap_fetch_overview($imap, $sequence);
	//关闭连接
	$imap_close($imap);
?>
