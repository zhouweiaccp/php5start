<?php
  /**************************************/
  /*		�ļ�����lock_topic.php		*/
  /*		���ܣ����á�����������		*/
  /**************************************/

  require('config.inc.php');

  //�ж��Ƿ�Ϊ����Ա
  if ($_SESSION['username'] == ADMIN_USER)
  {
	//ȡ������ID
	$id=$_POST['id'];

	//������SQL���
	$sql = "UPDATE forum_topic SET locked='1' WHERE id='$id'";

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
