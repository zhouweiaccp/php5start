<?php
  /**************************************/
  /*		�ļ�����update_profile.php	*/
  /*		���ܣ��û������޸�ҳ��		*/
  /**************************************/

  require('config.inc.php');

  if (!$_SESSION['username']) {
	ExitMessage("��<b>��¼</b>��ִ�и�����", "logon_form.php");
  }

  //�û���
  $username=$_SESSION['username'];
  //�����ʼ�
  $email=ClearSpecialChars($_POST['email']);
  //��ʵ����
  $realname=ClearSpecialChars($_POST['realname']);
  //�û�����
  $password=$_POST['password'];

  if (!$password) 
  {
	//�������Ϊ�գ�������������
	$sql="UPDATE forum_user 
			SET email = '$email', 
			realname = '$realname' 
		  WHERE username = '$username'";
  } else {
	//����������µ����룬��������Ҳ���Ը���
	$password = md5($password);
	$sql="UPDATE forum_user 
			SET password = '$password', 
			email = '$email', 
			realname = '$realname' 
		  WHERE username = '$username'";
  }

  $result=mysql_query($sql);

  if($result){
?>
<h2>�������ϸ��³ɹ�</h2>

<p>
	���ĸ��������Ѿ����ɹ����¡� 
	��<a href="main_forum.php">����</a>��̳��ҳ��
</p>
<?php
  }
  else {
	ExitMessage("��¼�����ڣ�");
  }

?>
