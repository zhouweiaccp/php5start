<?php
	/*******************************************/
	/*	文件名：message.php		*/
	/*	功能：获取信件的结构信息	*/
	/*******************************************/

	//用户信箱的配置信息
	$host = "pop3.163.com";
	$port = 110;
	$user = 'username';
	$pass = 'password';
	
	//连接信箱
	$spec = sprintf("{%s:%s/pop3}INBOX", $host, $port);
	$imap = imap_open($spec, $user, $pass)
		or die('连接POP3服务器出错！');
	
	//从GET获取uid的值
	$uid  = $_GET['uid'];
	$overviews = imap_fetch_overview($imap, $uid, FT_UID);
	
	//邮件的结构信息
	$data = $overviews[0];
	$struct = imap_fetchstructure($imap, $uid, FT_UID);

	//取邮件的第一部分，一般第一部分是信件的主体。
	$pid = 1;
	$body = imap_fetchbody($imap, $uid, 1, FT_UID);
	
	//获取邮件结构的必要信息
	//如果邮件有多个部分，就使用$struct->parts[0]
	//否则直接使用$struct得值
	if(isset($struct->parts) && count($struct->parts))
	{
		//信件的编码类型
		$encoding = $struct->parts[0]->encoding; 

		//信件的MIME编码类型
		$subtype  = strtoupper($struct->parts[0]->subtype); 
	}
	else{
		//信件的编码类型
		$encoding = $struct->encoding;

		//信件的MIME编码类型
		$subtype  = strtoupper($struct->subtype);
	}
	
	//解码，只有3、4两种情况需要转换，其他为不同文本
	if($encoding == 3)
	{	
		//BASE64
		$body = imap_base64($body);
		$body = nl2br($body);
	}elseif($encodeing == 4)
	{ 
		//QUOTED-PRINTABLE
		$body = imap_qprint($body);
	}
	
	if($subtype == 'PLAIN')
		$body = htmlspecialchars($body);

	//关闭邮件服务器连接
	imap_close($imap);
?>
<html>
<head>
<title>邮件正文</title>
</head>
<body>
<?
	//输出头
	echo "<p>";
	echo "\n<br><b>邮件标题：</b>".htmlspecialchars($data->subject);
	echo "\n<br><b>发 件 人：</b>".htmlspecialchars($data->from);
	echo "\n<br><b>收 件 人：</b>".htmlspecialchars($data->to);
	echo "\n<br><b>发信日期：</b>".htmlspecialchars($data->date);
	echo "\n<br><b>信件大小：</b>".$data->size."字节";
	echo "\n<br><b>信件内容：</b>";
	
	//输出正文
	echo "<blockquote>";
	echo $body;
	echo "</blockquote>";
?>
</body>
</html>
