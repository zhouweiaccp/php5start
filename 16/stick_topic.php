<?php
  /**************************************/
  /*		�ļ�����stick_topic.php		*/
  /*		���ܣ����á��ö�������		*/
  /**************************************/

  require('config.inc.php');

  //�ж��Ƿ�Ϊ����Ա
  if ($_SESSION['username'] == ADMIN_USER)
  {
	//ȡ������ID
	$id=$_POST['id'];

	//���á��ö�����SQL���
	$sql = "UPDATE forum_topic SET sticky='1' WHERE id='$id'";

	$result=mysql_query($sql);

	if($result)
	{
		//��תҳ��
		header("Location: view_topic.php?id=$id");
	}
	else {
		ExitMessage("���ݿ��������");
	}

  } else {
	ExitMessage("��û�й���Ȩ�ޣ�");
  }
?>
