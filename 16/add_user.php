<?php
  /**********************************/
  /*	   �ļ�����add_user.php		*/
  /*	   ���ܣ����ע���û���¼	*/
  /**********************************/
  require('config.inc.php');

  //ȡ���ύ�����ݣ���������
  //�û���
  $username	= ClearSpecialChars($_POST['username']);
  //����
  $password	= $_POST['password'];
  //�����ʼ���ַ
  $email		= ClearSpecialChars($_POST['email']);
  //��ʵ����
  $realname	= ClearSpecialChars($_POST['realname']);

  //�������ݵĺϷ���
  if (!$username) { 
	ExitMessage('�������û�����'); 
  }
  if (!$password) { 
 	ExitMessage('���������룡'); 
  }
  if (!$email) { 
	ExitMessage('����������ʼ���ַ��'); 
  }
  elseif(!checkEmail($email)){
	ExitMessage('�����ʼ���ַ��ʽ����'); 
  }

  //���������MD5����
  $password=md5($_POST['password']);

  //�ж��û��Ƿ��Ѿ�����
  $sql = "SELECT * FROM forum_user WHERE username='$username'";
  $result = mysql_query($sql);
  $num_rows = mysql_num_rows($result);

  if ($num_rows > 0) {
	ExitMessage('���û��Ѿ����ڣ�');
  }

  //�����û�
  $sql = "INSERT INTO forum_user (username, password, email, realname, regdate)
		VALUES('$username', '$password', '$email', '$realname', NOW())";
  $result = mysql_query($sql);

  if($result)
  {
	?>
	<h2>�����û�</h2>

	<p>�����û��˺��Ѿ�����������<a href="logon_form.php">����</a>��¼��</p>
	<?php
  }
  else {
	ExitMessage("���ݿ����");
  }
?>
