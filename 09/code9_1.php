<?php
	$reciever = "jerry@taodoor.com, kelly@taodoor.com";		//�ʼ�������
	$subject = "The Subject";								//����
	$message = "Line One.\r\nLine Two.\r\nLine Three.\r\n";		//����

	$headers = array(
		"To: Jerry <jerry@taodoor.com>, Kelly <kelly@taodoor.com>",
		"From: Mail Sender <birthday@taodoor.com>",
		"Cc: Webmaster@taodoor.com",
		"Bcc: Mail Check@taodoor.com",
	);
	$header_string = join("\r\n", $headers);					//�ʼ�ͷ��Ϣ

	if(@mail($reciever, $subject, $message, $header_string)){
		echo "�ʼ����ͳɹ���";
	}else{
		echo "�ʼ�����ʧ�ܣ�";
	}
?>
