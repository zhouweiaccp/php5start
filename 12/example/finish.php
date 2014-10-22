<?php
	/*************************************/
	/*    文件名：finish.php	         */
	/*    功能：数据库操作统一处理页面	 */
	/*************************************/

	include "dbconnect.php";
	
	$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
	
	//预定义错误信息数组，以及相关信息。
	$error = array();	
	$message = "<p><b>系统错误，非法操作！</b></p>";
	$button = "<input value=\" 返 回 \" type=\"button\" onclick=\"history.back()\">\n";

	if(empty($_POST['name'])){
		$error[] = "用户名没有填写！";
	}
	if(empty($_POST['email'])){
		$error[] = "电子邮件没有填写！";
	}if( !eregi("^[-a-z0-9_\.]+\@([0-9a-z][-a-z0-9_]+\.)+[a-z]{2,3}$", $_POST['email']) ){
		$error[] = "电子邮件格式错误！";
	}
	if($_POST['url'] && !eregi('^http://', $_POST['url']) ){
		$error[] = "网址格式错误！";
	}
	if(empty($_POST['comment'])){
		$error[] = "留言内容没有填写！";
	}
	
	//发现错误的处理
	if(count($error))
	{
		$message  = "<p><b>系统发现已下错误，请修正！</b>\n";
		$message .= "<ul>\n";
		foreach($error as $err){
			$message .= "<li>$err</li>\n";
		}
		$message .= "</ul></p>\n";
		$button = $back_button;
	}
	else		//没有错误
	{
		$id		 = intval($_POST['id']);
		$name    = mysql_real_escape_string(stripcslashes($_POST['name']));
		$sex     = intval($_POST['sex']);
		$email   = mysql_real_escape_string(stripcslashes($_POST['email']));
		$url     = mysql_real_escape_string(stripcslashes($_POST['url']));
		$comment = mysql_real_escape_string(stripcslashes($_POST['comment']));

		if($act=='write')
		{
			//插入数据库
			$sql = "INSERT INTO guestbook (name, sex, email, url, comment, postdtm)
					VALUES ('$name', '$sex', '$email', '$url', '$comment', NOW())";

		}
		elseif($act=='edit')
		{
			//更新数据库
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

		//根据影响的记录行数，判断操作成功与否。
		if(mysql_affected_rows()>0)
		{
			$message = "<p><b>留言内容已经存储成功。</b></p>\n";
			$button = "<input value=\" 返 回 \" type=\"button\" onclick=\"location.href='list.php'\">\n";
		}
		else
		{
			$message = "<p><b>留言内容存储失败！</b></p>\n";
			$button = "<input value=\" 返 回 \" type=\"button\" onclick=\"history.back()\">\n";
		}
	}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>系统结果</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
   <td width="100%" class="HeaderRow">系统信息</td>
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
