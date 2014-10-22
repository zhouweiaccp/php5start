<?php
  /********************************/
  /*   文件名：write_post.php     */
  /*   说明：签写留言的处理程序   */
  /********************************/

  require_once 'config.inc.php';

  //错误信息
  $errmsg = '';

  //获取用户IP地址
  if(getenv('HTTP_CLIENT_IP'))
  {
	 $ip = getenv('HTTP_CLIENT_IP');
  }
  elseif(getenv('HTTP_X_FORWARDED_FOR'))
  {
	$ip = getenv('HTTP_X_FORWARDED_FOR');
  }
  elseif(getenv('REMOTE_ADDR'))
  {
	$ip = getenv('REMOTE_ADDR');
  }
  else
  {
	$ip = $_SERVER['REMOTE_ADDR'];
  }

  $hide = ($_POST['hide']) ? 1 : 0;			//悄悄话
  $name = $_POST['name'];					//用户名
  $gender = ($_POST['gender']) ? 1 : 0;		//性别
  $email = $_POST['email'];					//电子邮件地址
  $homepage = $_POST['homepage'];			//个人主页
  $face = $_POST['face'];					//代表头像
  $oicq = $_POST['oicq'];					//OICQ
  $content = $_POST['content'];				//留言内容

  //判断输入的正确性
  if( trim($name, " 　\n\t\r\0\x0B")=="" )
  {
	$errmsg = "您的昵称没有填写！\n请重新填写。";
  }

  elseif( !eregi("^[-a-zA-Z0-9_\x7f-\xff]+$", $name) )
  {
	$errmsg = "您的昵称包含非法字符！\n昵称只能由字母、数字或汉字组成。";
  }
  elseif( strlen($name)>16 )
  {
  	$errmsg = "您的昵称填写不规范！\n昵称最多只能包含 16 字节。";
  }
  elseif ( $email && !eregi('[-a-z0-9_\.]+\@([0-9a-z][-a-z0-9_]+\.)+[a-z]{2,3}$', $email) )
  {
  	$errmsg = "您的邮箱地址填写不规范！\n请正确填写您的常用邮箱地址。";
  }
  elseif ( $oicq && !ereg('^[0-9]{5,14}$', $oicq) )
  {
  	$errmsg = "您的 OICQ 号码填写不规范！\n请正确填写您的 OICQ 号码。";
  }
  elseif ( $homepage && !eregi('^http://', $homepage) )
  {
  	$errmsg = "您的主页地址填写不规范！\n主页地址必须以“http://”开头。";
  }
  elseif ( trim($content, " 　\n\t\r\0\x0B")=="" )
  {
  	$errmsg = "您的留言内容不能留空白！\n请重新填写。";
  }
  elseif ( strlen($content)>5000 )
  {
  	$errmsg = "您的留言内容太长了！\n您要把留言本撑爆呀？";
  }

  if($errmsg)
  {
  	?>
		<!--弹出错误信息框-->
		<script>
			alert("<?php echo str_replace("\n", '\n', $errmsg); ?>");
			history.back();
		</script>
  	<?php
  }
  else
  {
  	$sql = "INSERT INTO guestbook (hide, name, gender, email, homepage,
							   oicq, face, ip, time, content)
			VALUES ('$hide', '$name', '$gender', '$email', '$homepage',
				  '$oicq', '$face', '$ip', NOW(), '$content')";

	mysql_query($sql);
  	$errmsg = "留言发表成功!";

  	?>
		<!--弹出信息对话框-->
		<script>
			alert("<?php echo str_replace("\n", '\n', $errmsg); ?>");
			location.href="list.php";
		</script>
  	<?php
	}

?>
