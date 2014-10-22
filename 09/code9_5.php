<?ph	p
	$to = "user1@163.com";
	$subject = "带有附件的邮件";
	$message = "邮件的正文，
这是一封带有附件的邮件。
";
	//生成分界线
	$boundary = "BONDARY_" .md5(time());

	//MIME信头
	$mime_header = "MIME-Version: 1.0\r\n";
	$mime_header .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n\r\n";
	$mime_header .= "This is a multi-part message in MIME format.\r\n\r\n";
	
	//消息正文
	$mime_header .= "--$boundary\r\n\r\n";
	$mime_header .= "Content-Type: text/plain; charset=\"gb2312\"\r\n";
	$mime_header .= "Content-Transfer-Encoding: base64;\r\n\r\n";
	$mime_header .= chunk_split(base64_encode($message)). "\r\n\r\n";
	
	//增加附件
	$filename = "attachment.txt";
	$filecontent = file_get_contents($filename);
	$mime_header .= "--$boundary\r\n\r\n";
	$mime_header .= "Content-Type: text/plain;\r\n";
	$mime_header .= "Content-Transfer-Encoding: base64;\r\n";
	$mime_header .= "Content-Disposition: attachment; filename=\"$filename\";\r\n\r\n";
	$mime_header .= chunk_split(base64_encode($filecontent));

	//发送邮件
	mail($to, $subject, "", $mime_header);
?>
