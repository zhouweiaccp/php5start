<?php
  /**************************************/
  /*		�ļ�����del_topic.php		*/
  /*		���ܣ�ɾ���������ݲ���		*/
  /**************************************/

  require('config.inc.php');

  //�ж��Ƿ�Ϊ����Ա
  if ($_SESSION['username'] == ADMIN_USER) 
  {
	// get data that sent from form 
	$id=$_GET['id'];

	//ɾ������
	$sql = "DELETE FROM forum_topic WHERE id=$id";
	$result=mysql_query($sql);

	//ɾ���ظ�����
	$sql2 = "DELETE FROM forum_reply WHERE topic_id=$id";
	$result2=mysql_query($sql2); 

	if($result AND $result2)
	{
		//ҳ����ת
		header("Location: main_forum.php");
	}
	else {
		ExitMessage("���ݿ��������");
	}
  } else {

	ExitMessage("��û�й���Ȩ�ޣ�");
  }
?>
16.7  �û����ϲ鿴���༭����
