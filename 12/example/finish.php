<?php
	/*************************************/
	/*    �ļ�����finish.php	         */
	/*    ���ܣ����ݿ����ͳһ����ҳ��	 */
	/*************************************/

	include "dbconnect.php";
	
	$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
	
	//Ԥ���������Ϣ���飬�Լ������Ϣ��
	$error = array();	
	$message = "<p><b>ϵͳ���󣬷Ƿ�������</b></p>";
	$button = "<input value=\" �� �� \" type=\"button\" onclick=\"history.back()\">\n";

	if(empty($_POST['name'])){
		$error[] = "�û���û����д��";
	}
	if(empty($_POST['email'])){
		$error[] = "�����ʼ�û����д��";
	}if( !eregi("^[-a-z0-9_\.]+\@([0-9a-z][-a-z0-9_]+\.)+[a-z]{2,3}$", $_POST['email']) ){
		$error[] = "�����ʼ���ʽ����";
	}
	if($_POST['url'] && !eregi('^http://', $_POST['url']) ){
		$error[] = "��ַ��ʽ����";
	}
	if(empty($_POST['comment'])){
		$error[] = "��������û����д��";
	}
	
	//���ִ���Ĵ���
	if(count($error))
	{
		$message  = "<p><b>ϵͳ�������´�����������</b>\n";
		$message .= "<ul>\n";
		foreach($error as $err){
			$message .= "<li>$err</li>\n";
		}
		$message .= "</ul></p>\n";
		$button = $back_button;
	}
	else		//û�д���
	{
		$id		 = intval($_POST['id']);
		$name    = mysql_real_escape_string(stripcslashes($_POST['name']));
		$sex     = intval($_POST['sex']);
		$email   = mysql_real_escape_string(stripcslashes($_POST['email']));
		$url     = mysql_real_escape_string(stripcslashes($_POST['url']));
		$comment = mysql_real_escape_string(stripcslashes($_POST['comment']));

		if($act=='write')
		{
			//�������ݿ�
			$sql = "INSERT INTO guestbook (name, sex, email, url, comment, postdtm)
					VALUES ('$name', '$sex', '$email', '$url', '$comment', NOW())";

		}
		elseif($act=='edit')
		{
			//�������ݿ�
			$sql = "UPDATE guestbook SET
					name = '$name', 
					sex = '$sex',
					email = '$email',
					url = '$url',
					comment = '$comment',
					postdtm = NOW()
					WHERE id = $id";
		}

		$res = mysql_query($sql);
		echo mysql_error();

		//����Ӱ��ļ�¼�������жϲ����ɹ����
		if(mysql_affected_rows()>0)
		{
			$message = "<p><b>���������Ѿ��洢�ɹ���</b></p>\n";
			$button = "<input value=\" �� �� \" type=\"button\" onclick=\"location.href='list.php'\">\n";
		}
		else
		{
			$message = "<p><b>�������ݴ洢ʧ�ܣ�</b></p>\n";
			$button = "<input value=\" �� �� \" type=\"button\" onclick=\"history.back()\">\n";
		}
	}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ϵͳ���</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
   <td width="100%" class="HeaderRow">ϵͳ��Ϣ</td>
  </tr>
  <tr>
   <td class="SubTitleRow">
<span class="redfont">
	<br>
	<?php echo $message ?>
	<br>
</span></td>
  </tr>
  <tr>
   <td align="center">
	<?php echo $button ?>
   </td>
  </tr>
 </table>
</body>
</html>
