<?php
	/********************/
	/*   ϵͳ��������   */
	/********************/

	//�������ݿ�Ķ���
	define('DB_USER',		 "root");			//�û���
	define('DB_PASSWORD',	 "pass");			//����
	define('DB_HOST',		 "localhost");		//���ݿ�������ַ
	define('DB_NAME',		 "php_gbook");		//���ݿ�

	//����Ա�û��˺�
	define('ADMIN_USER',	"admin");
	define('ADMIN_PASS',	"admin");

	//��ҳ���ã�ÿҳ�����ʾ�ļ�¼��
	define('EACH_PAGE',	 5);

	/******************/
	/*   ��ʼ������   */
	/******************/
	//����SESSION������COOKIE
	ob_start();
	if(function_exists(session_cache_limiter))
	{
		session_cache_limiter("private, must-revalidate");
	}
	session_start();

	//�����ݿ�����
	$db = mysql_pconnect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$db)
	{
	   die('<b>���ݿ�����ʧ�ܣ�</b>');
	   exit;
	}
	//ѡ�����ݿ�
	mysql_select_db (DB_NAME);
?>