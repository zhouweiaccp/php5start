<?ph	p
	$to = "user1@163.com";
	$subject = "���и������ʼ�";
	$message = "�ʼ������ģ�
����һ����и������ʼ���
";
	//���ɷֽ���
	$boundary = "BONDARY_" .md5(time());

	//MIME��ͷ
	$mime_header = "MIME-Version: 1.0\r\n";
	$mime_header .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n\r\n";
	$mime_header .= "This is a multi-part message in MIME format.\r\n\r\n";
	
	//��Ϣ����
	$mime_header .= "--$boundary\r\n\r\n";
	$mime_header .= "Content-Type: text/plain; charset=\"gb2312\"\r\n";
	$mime_header .= "Content-Transfer-Encoding: base64;\r\n\r\n";
	$mime_header .= chunk_split(base64_encode($message)). "\r\n\r\n";
	
	//���Ӹ���
	$filename = "attachment.txt";
	$filecontent = file_get_contents($filename);
	$mime_header .= "--$boundary\r\n\r\n";
	$mime_header .= "Content-Type: text/plain;\r\n";
	$mime_header .= "Content-Transfer-Encoding: base64;\r\n";
	$mime_header .= "Content-Disposition: attachment; filename=\"$filename\";\r\n\r\n";
	$mime_header .= chunk_split(base64_encode($filecontent));

	//�����ʼ�
	mail($to, $subject, "", $mime_header);
?>
