<?php
	$username = $_SERVER['REMOTE_USER'];
	$filename = $_GET['file'];

	//���ļ������й��ˣ��Ա�֤ϵͳ��ȫ
	if (!ereg('^[^./][^/]*$', $userfile))
	{
		die('�ⲻ��һ���Ƿ����ļ�����');
	}

	//���û������й���
	if (!ereg('^[^./][^/]*$', $username))
	{
		die('�ⲻ��һ����Ч���û���');
	}
	
	//ͨ����ȫ���ˣ�ƴ���ļ�·��
	$thefile = "/home/$username/$filename";
?>
