<?php
  //包含Smtp_Mail类文件
  Include 'Smtp_Mail.php';

  //SMTP服务器配置信息
  $mailconf = array (
	'from' => 'username@163.com',
	'smtp' => 'smtp.163.com',
	'port' => 25,
	'auth' => true,
	'username' => 'username',
	'password' => 'password',
	'debug' => true,
  );

  //邮件内容
  $mailinfo = array (
	'to' => array (
	    'user1@163.com', 'user2@163.com', 'user3@163.com',
	),
	'from' => 'moth3k@163.com',
	'subject' => 'This is a test subject',
	'body' => ' Hi, every body, here is a test of mail.
  Try to vist taodoor.com for more information.
  Antor line wrote here.',
  );

  //创建实例
  $mail = new Smtp_Mail($mailinfo, $mailconf);
  $mail->send();
  if($mail->stat()){
	echo '发送成功！';
  }else{
	echo '发送失败！';
  }
?>
