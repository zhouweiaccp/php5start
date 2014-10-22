<?php
	$reciever = "jerry@taodoor.com, kelly@taodoor.com";		//邮件接收者
	$subject = "The Subject";								//主题
	$message = "Line One.\r\nLine Two.\r\nLine Three.\r\n";		//正文

	$headers = array(
		"To: Jerry <jerry@taodoor.com>, Kelly <kelly@taodoor.com>",
		"From: Mail Sender <birthday@taodoor.com>",
		"Cc: Webmaster@taodoor.com",
		"Bcc: Mail Check@taodoor.com",
	);
	$header_string = join("\r\n", $headers);					//邮件头信息

	if(@mail($reciever, $subject, $message, $header_string)){
		echo "邮件发送成功！";
	}else{
		echo "邮件发送失败！";
	}
?>
