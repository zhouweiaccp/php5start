<?php
  //����POP3_Mail��
  Include 'POP3_Mail.php';

  // POP3������������Ϣ
  $mailconf = array (
	'pop3' => 'pop3.163.com',
	'username' => 'username',
	'password' => 'password',
	'debug' => true,
  );

  //POP3����ʵ����
  $pop3 = new POP3_Mail ($mailconf);

  //����POP3������
  $pop3->connect();

  //��֤
  if($pop3->auth()){
	echo "<p>��½�ɹ�!";
  }
  if($number = $pop3->getMailNumber()){
	echo "<p>�ʼ�����Ϊ��$number";
  }

  //�����ʼ�������
  for($id=1; $id<=$num; $id++)
  {
	if($content = $pop3->getMail($id)){
		echo "<p>��{$id}���ʼ�������Ϊ��<hr>";
		echo htmlspecialchar ($content);
		echo "<hr>";
	}
  }
  $pop3->close();				//�ر�����
?>