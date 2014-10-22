<?php
  //包含POP3_Mail类
  Include 'POP3_Mail.php';

  // POP3服务器配置信息
  $mailconf = array (
	'pop3' => 'pop3.163.com',
	'username' => 'username',
	'password' => 'password',
	'debug' => true,
  );

  //POP3对象实例化
  $pop3 = new POP3_Mail ($mailconf);

  //连接POP3服务器
  $pop3->connect();

  //认证
  if($pop3->auth()){
	echo "<p>登陆成功!";
  }
  if($number = $pop3->getMailNumber()){
	echo "<p>邮件总数为：$number";
  }

  //下载邮件的内容
  for($id=1; $id<=$num; $id++)
  {
	if($content = $pop3->getMail($id)){
		echo "<p>第{$id}封邮件的内容为：<hr>";
		echo htmlspecialchar ($content);
		echo "<hr>";
	}
  }
  $pop3->close();				//关闭连接
?>