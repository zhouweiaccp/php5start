<?php
	/*******************/
	/*  ϵͳ��������   */
	/*******************/

	//�������ݿ�Ķ���
	define('DB_USER',		 "root");		//�û���
	define('DB_PASSWORD',	 "pass");		//����
	define('DB_HOST',		 "localhost");	//���ݿ�������ַ
	define('DB_NAME',		 "php_bbs");	//���ݿ�

	//����Ա�û�
	define('ADMIN_USER',	"admin");

	//��ҳ���ã�ÿҳ�����ʾ�ļ�¼��
	define('EACH_PAGE',	 5);

	//��Ч���ַ�������ClearSpecialChars()����
	$invalidchars = array(
		"'",				//������
		";",				//�ֺ�
		"=",				//�Ⱥ�
		"\\",				//��б��
		"/"					//б��
	);

	//�����֡����飬����FilterBadWords()
	$badwords=array
	(
		"fuck", "shit", "wanker", "cunt", "gay",
		"nigger", "bastard", "tosser", "dipshit",
		"homosexual", "nigga", "gaylord", "retard",
		"asshole", "slut", "prick", "cock", "pussy",
		"bitch", "wanking", "bollocks" 
	);

	/*******************/
	/*  ������������   */
	/*******************/

	//���ܣ��������ʼ���ַ��ʽ�Ƿ���ȷ
	//���룺�����ʼ���ַ
	//�����true��false
	function CheckEmail($email)
	{
		$check = "/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_-]+){0,3}$/";
		
		if(preg_match ($check, $email)){
			return true;
		}
		else{
			return false;
		}
	}

	//���ܣ���ʾ������Ϣ�ͷ��ص����ӵ�ַ������ֹ����ִ��
	//���룺������Ϣ, ���ӵ�ַ
	//������ַ���
	function ExitMessage($message, $url='')
	{
		echo '<p class="message">';
		echo $message;
		echo '<br>';
		if($url){
	    	echo '<a href="'.$url.'">����</a>';
	    }else{
	    	echo '<a href="#" onClick="window.history.go(-1);">����</a>';
	    }
		echo '</p>';
		exit;
	}

	//���ܣ�����ַ����е������ַ�
	//���룺�ַ���
	//������ַ���
	function ClearSpecialChars($str)
	{
		global $invalidchars;

		$str = trim($str);
		$str = str_replace($invalidchars,"",$str);
		return $str;
	}

	//���ܣ������֡��������
	//���룺�ַ���
	//������ַ���
	function FilterBadWords($str)
	{
		global $badwords;

		//���������
		$replacements=array("[ensored]", "***");

		for($i=0;$i < sizeof($badwords);$i++)
		{
			//�������������
			srand((double)microtime()*1000000); 
			
			//�����������
			$rand_key = (rand()%sizeof($replacements));
			$str=eregi_replace($badwords[$i], $replacements[$rand_key], $str);
		}
		return $str;
	}

	/*******************/
	/*   ��ʼ������    */
	/*******************/

	//����SESSION
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
