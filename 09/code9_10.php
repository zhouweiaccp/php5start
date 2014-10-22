<?php
	$mbox = imap_open("{localhost:110/pop3}INBOX"£¬"usr"£¬"pwd");
	$message = imap_body($mbox£¬$msgid);
	imap_close($mbox);
	echo $message;
?>
