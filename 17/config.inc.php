<?php
	/**********************/
	/*    ϵͳ��������    */
	/**********************/

	//�������ݿ�Ķ���
	define('DB_USER',		 "root");		//�û���
	define('DB_PASSWORD',	 "pass");		//����
	define('DB_HOST',		 "localhost");	//���ݿ�������ַ
	define('DB_NAME',		 "php_shop");	//���ݿ�

	//����Ա�û��˺�
	define('ADMIN_USER',	"admin");
	define('ADMIN_PW',		"passwd");

	//��ҳ���ã�ÿҳ�����ʾ�ļ�¼��
	define('EACH_PAGE',	 5);

	//�ļ��ϴ�Ŀ¼
	define('UPLOAD_PATH',dirname(__FILE__)."/uploads/");

	/**********************/
	/*    ������������    */
	/**********************/

	//���ܣ���ʾ������Ϣ�ͷ��ص����ӵ�ַ������ֹ����ִ��
	//���룺������Ϣ, ���ӵ�ַ
	//�����������Ϣ
	function ExitMessage($message, $url='')
	{
		echo '<p class="message">'. $message. '<br>';
		if($url){
		    	echo '<a href="'.$url.'">����</a>';
		}else{
			echo '<a href="#" onClick="window.history.go(-1);">����</a>';
		}
		echo '</p>';
		exit;
	}

	//���ܣ����ڹ�����棬��ʾ������Ϣ
	//���룺������Ϣ����
	//�����������Ϣ
	function ShowErrorBox($error)
	{
		if(!is_array($error)){
			$error = array($error);
		}
		$error_msg = '<ul>';
		foreach($error as $err){
			$error_msg .= "<li>$err</li>";
		}
		$error_msg .= '</ul>';
		echo '<div class="error">' .$error_msg. '</div>';
	}

	//���ܣ���ʾ���������˵�<OPTION>
	//���룺������Ϣ, ���ӵ�ַ
	//������ַ���
	function OptionCategories($selected_id=0)
	{
		global $db;
		$sql = "SELECT * FROM categories ORDER BY category_name";
		$result=mysql_query($sql);
		while ($row=mysql_fetch_array($result))
		{
		  $category_id=$row["category_id"];
		  $category_name=htmlspecialchars($row["category_name"]);

		  if($selected_id == $category_id)
		  {
			echo '<option value="'.$category_id.'" selected>'.$category_name.'</option>';
		  }else{
			echo '<option value="'.$category_id.'">'.$category_name.'</option>';
		  }
		}
	}

	//��ʽ��HTML�ַ���
	//���룺HTML�ַ���
	//������ַ���
	function Html2Text($html)
	{
		return htmlspecialchars(stripslashes($html));
	}

	//��ʽ���۸��ַ���
	//���룺�۸�
	//��������ж��ŵļ۸��ַ���
	function MoneyFormat($price)
	{
		return number_format($price, 2, '.', ',');
	}

	/********************/
	/*    ��ʼ������    */
	/********************/

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
