<?php
	//打开邮件POP3服务器连接
	$mbox = imap_open("{localhost:110/pop3}INBOX"，"usr"，"pwd");
	//获取邮件内容
	$message = imap_fetchbody($mbox，$uid, 1, FT_UID);
	//关闭邮件服务器
	imap_close($mbox);
	//输出邮件内容
	echo $message;
?>
