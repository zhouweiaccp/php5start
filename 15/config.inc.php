<?php
	/*******************/
	/*  ϵͳ��������   */
	/*******************/

	//�������ݿ�Ķ���
	define('DB_USER',		 "root");		//�û���
	define('DB_PASSWORD',	 "pass");		//����
	define('DB_HOST',		 "localhost");	//���ݿ�������ַ
	define('DB_NAME',		 "php_chat");	//���ݿ�

	//�����ҷ���������ʾ������
	$chatrows = "25";

	//�ж��û���ʱ��������ֵ���룩
	$sessiontime = "100";

	//ҳ��ˢ�µ�ʱ�������룩
	$refreshrate = "5";

	//�Ƿ�ʹ�ñ������
	$use_smilies = true;

	//�趨��Ϊ����Ա���û���
	$admin = "admin";

	//��������
	$smilies = array(
		   ":)" => '<img src="smilies/smile.gif">',
		   ":(" => '<img src="smilies/sad.gif">',
		   ";)" => '<img src="smilies/wink.gif">',
		   ":D" => '<img src="smilies/lol.gif">',
		   ":*(" => '<img src="smilies/crying.gif">',
		   ":?" => '<img src="smilies/confused.gif">',
		   ":X" => '<img src="smilies/sealed.gif">',
		   "8)" => '<img src="smilies/cool.gif">',
		   ":P" => '<img src="smilies/tongue.gif">',
		   ":@" => '<img src="smilies/mad.gif">',
		   ":$" => '<img src="smilies/shy.gif">',
		   ":L" => '<img src="smilies/love.gif">',
		   ":|" => '<img src="smilies/blank.gif">',
		   ":Z" => '<img src="smilies/sleep.gif">',
		   "(devil)" => '<img src="smilies/devil.gif">',
		   "(clown)" => '<img src="smilies/clown.gif">',
		   "(pig)" => '<img src="smilies/pig.gif">',
		   "(cow)" => '<img src="smilies/cow.gif">',
		   "(monkey)" => '<img src="smilies/monkey.gif">',
		   "(chicken)" => '<img src="smilies/chicken.gif">',
		   "(rose)" => '<img src="smilies/rose.gif">',
		   "(skull)" => '<img src="smilies/skull.gif">',
		   "(alien)" => '<img src="smilies/alien.gif">',
		   "(boy)" => '<img src="smilies/boy.gif">',
		   "(girl)" => '<img src="smilies/girl.gif">',
	);

	/*******************/
	/*  ������������   */
	/*******************/

	//���ܣ����ַ����е������ַ�ת��Ϊ����ͼƬ
	//���룺�ַ���
	//������ַ���
	function Smilies($text) {
		global $smilies;
		$text = strtr ($text, $smilies );
		return $text;
	}

	//���ܣ���ʾ������Ϣ�ͷ��ص����ӵ�ַ������ֹ����ִ��
	//���룺������Ϣ, ���ӵ�ַ
	//�����
	function ExitMessage($message, $url='')
	{
		echo '<p class="message">';
		echo $message;
		echo '<br />';
		if($url){
	    	echo '<a href="'.$url.'">����</a>';
	    }else{
	    	echo '<a href="#" onClick="window.history.go(-1);">����</a>';
	    }
		echo '</p>';
		exit;
	}


	/*******************/
	/*   ��ʼ������    */
	/*******************/

	//����SESSION
	session_start();

	//�����ݿ�����
	$db = mysql_pconnect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$db) {
	   die('<b>���ݿ�����ʧ�ܣ�</b>');
	   exit;
	}
	mysql_select_db (DB_NAME);

?>
