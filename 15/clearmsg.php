<?php
  /**************************************/
  /*		�ļ�����clearmsg.php		*/
  /*		���ܣ���������¼ҳ��		*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";	//��������ͷ��ҳ��

  //�û���
  $username = $_SESSION['username'];
  //��Ϊ
  $action = $_GET['action'];

  if($action == "private")
  {
	//ɾ���û���˽�������¼

	//��������Ϊ$username�ļ�¼����ɾ�����
	$query = "UPDATE chatter_privboard SET delfrom = 1
		  WHERE fromname = '$username'";
	$result = @mysql_query ($query);

	//��������Ϊ$username�ļ�¼����ɾ�����
	$query = "UPDATE chatter_privboard SET delto = 1
		  WHERE toname = '$username'";
	$result = @mysql_query ($query);

	ExitMessage("ȫ��˽����Ϣ����ɹ���", "action.php");
  }
  elseif($action == "all")
  {
	//��ѯ����Ա
	$query = "SELECT * FROM chatter_users
		 	WHERE username = '$username' AND isadmin = 1";
	$result = mysql_query ($query);

	//�ж��Ƿ�Ϊ����Ա
	$num_rows = mysql_num_rows($result);
	$isadmin = ($num_rows > 0) ? true : false;

	if($isadmin)
	{
		//��չ��������¼
		$query = "TRUNCATE TABLE chatter_chatboard";
		$result = @mysql_query ($query);

		//���˽�������¼
		$query = "TRUNCATE TABLE chatter_privboard";
		$result = @mysql_query ($query);

		ExitMessage("ȫ����Ϣ����ɹ���", "action.php");
	}
	else
	{
		ExitMessage("ֻ�й���Ա�������ȫ�������¼��", "");
	}
  }

?>
</body>
</html>
