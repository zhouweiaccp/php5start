<?php
  /**************************************/
  /*		�ļ�����add_reply.php		*/
  /*		���ܣ��ظ����±���ҳ��		*/
  /***************************************/

  require('config.inc.php');

  //�ж��û��Ƿ��¼
  if (!$_SESSION['username']) 
  {
	ExitMessage("��<b>��¼</b>��ִ�и�����", "logon_form.php");
  }

  //������ID
  $id=$_POST['id'];

  //��֤�����Ѿ����ڣ�δ������
  $sql = "SELECT * from forum_topic WHERE id='$id'";
  $result = mysql_query($sql);
  $topic_info = mysql_fetch_array($result);

  if (!$topic_info)
  {
	ExitMessage("���Ӽ�¼�����ڣ�", "main_forum.php");
  }
  if ($topic_info['locked'] == 1)
  {
	ExitMessage("�����Ѿ����������޷����лظ���");
  }

  //ȡ���û���Ϣ
  $username = $_SESSION['username'];
  $sql = "SELECT * from forum_user WHERE username='$username'";
  $result = mysql_query($sql);
  $user_info = mysql_fetch_array($result);

  //ȡ���ύ����������
  $reply_name=$_SESSION['username'];
  $reply_email=$user_info['email'];
  $reply_detail=filterBadWords($_POST['reply_detail']); 

  if (!$reply_detail)
  {
	ExitMessage("û�л�����¼��", "main_forum.php");
  }

  //ȡ��reply_id�����ֵ
  $sql = "SELECT Count(reply_id) AS MaxReplyId 
		FROM forum_reply WHERE topic_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_row($result);

  //��reply_id���ֵ+1�����û�и�ֵ��������Ϊ1��
  if ($rows)
  {
	$Max_id = $rows[0]+1;
  }
  else {
	$Max_id = 1;
  }

  //����ظ�����
  $sql="INSERT INTO forum_reply (topic_id, reply_id, reply_name, 
		reply_email, reply_detail, reply_datetime)
		VALUES('$id', '$Max_id', '$reply_name', 
		'$reply_email', '$reply_detail', NOW())";
  $result=mysql_query($sql);

  if($result)
  {
	//����reply�ֶ�
	$sql="UPDATE forum_topic SET reply='$Max_id' WHERE id='$id'";
	$result=mysql_query($sql);

	//ҳ����ת
	header("Location: view_topic.php?id=$id");
  }
  else {
	ExitMessage("��¼������");
  }

?>
