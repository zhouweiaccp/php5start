<?php
  /**************************************/
  /*		�ļ�����add_topic.php		*/
  /*		���ܣ��������³���			*/
  /**************************************/

  require('config.inc.php');

  if (!$_SESSION['username'])
  {
	//����û�δ��¼����ʾ������Ϣ
	include('header.inc.php');	//ͷ�ļ�
?>
<h2>��������</h2>

<h3>δע����û�</h3>
<p>�Բ�����<a href="create_user.php">ע��</a>���û���
	���߽���<a href="logon_form.php">��¼</a>��
</p>

<?php 
	include('footer.inc.php');		//β�ļ�

  } else {

	//����û���Ϣ
	$username = $_SESSION['username'];
	$sql = "SELECT * from forum_user WHERE username='$username'";
	$result = mysql_query($sql);
	$info = mysql_fetch_array($result);

	//ȡ�ô�������ֵ
	//����
	$topic	= filterBadWords($_POST['topic']);		//��������ֹ���
	//����
	$detail	= filterBadWords($_POST['detail']);		//���ĵ����ֹ���
	//������
	$name	= $_SESSION['username'];
	//�����ʼ���ַ
	$email	= $info['email'];
	//�Ƿ��ö�
	$sticky	= $_POST['sticky'];
	//�Ƿ�����
	$locked	= $_POST['locked'];

	//���ݺϷ��Լ��
	if (!$topic)
	{
		ExitMessage("��������⣡");
	}
	if (!$detail)
	{
		ExitMessage("���������ģ�");
	}

	//�ж��Ƿ�Ϊ����״̬
	if ($locked == "on" && $name == ADMIN_USER) { 
		$locked = 1; 
	}
	else {
		$locked = 0; 
	}

	//�ж��Ƿ��ö�״̬
	if ($sticky == "on" && $name == ADMIN_USER) {
		$sticky = 1;
	} 
	else {
		$sticky = 0;
	}

	//�����ݲ������ݿ�
	$sql="INSERT INTO forum_topic(topic, detail, name, email, datetime, locked, sticky)
		 VALUES('$topic', '$detail', '$name', '$email',NOW(), '$locked', '$sticky')";
	$result=mysql_query($sql);

	if($result)
	{
		//�ɹ�����תҳ�浽��̳��ҳ��
		header("Location: main_forum.php");
	}
	else 
	{
		ExitMessage("���ݿ����");
	}
}
?>
