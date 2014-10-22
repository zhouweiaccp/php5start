<?php
	/*************************************************/
	/*	文件名：mailist.php				*/
	/*	功能：用IMAP访问POP3服务器	*/
	/*************************************************/

	//用户信箱的配置信息
	$host = "pop3.163.com";
	$port = 110;
	$user = 'username';
	$pass = 'password';
	
	//连接信箱
	$spec = sprintf("{%s:%s/pop3}INBOX", $host, $port);
	$imap = imap_open($spec, $user, $pass)
		or die('连接POP3服务器出错！');
	
	//检查信箱
	$inbox = imap_check($imap);

	//每页显示的邮件数
	$eachpage = 10;

	//总信件数
	$total = $inbox->Nmsgs;

	//列表的起始值
	$start = ($_GET['offset']) ? $_GET['offset'] : 1;
	if($start>=$total) $start = $total;
	if($start<=1) $start = 1;

	//列表的终了值
	$end = $start + $eachpage -1;
	if($end>=$total) $end = $total;
	if($end<=1) $end = 1;

	//序列
	$sequence = "$start:$end";
	$overviews = imap_fetch_overview($imap, $sequence, FT_UID);

	//关闭邮件服务器连接
	imap_close($imap);
?>
<html>
<head>
<title>邮件列表</title>
</head>
<body>
<table width="100%" border="1">
  <tr>
    <th scope="col">邮件标题</th>
    <th scope="col">送信人</th>
    <th scope="col">发信时间</th>
    <th scope="col">字节</th>
    <th scope="col">Msgno/Uid</th>
  </tr>
<?php
	foreach($overviews as $data)
	{
?>
  <tr>
    <td>
	<a href="message.php?uid=<?php echo $data->uid ?>"
	 target="_blank"><?php echo htmlspecialchars($data->subject) ?></a></td>
    <td><?php echo htmlspecialchars($data->from) ?></td>
    <td><?php echo htmlspecialchars($data->date) ?></td>
    <td><?php echo htmlspecialchars($data->size) ?></td>
    <td><?php echo $data->msgno ?>/<?php echo $data->uid ?></td>
  </tr>
<?php
	}
?>
</table>
<p>
<?php if($start>1){ ?>
	<a href="?offset=<?php echo $start-$eachpage ?>">上一页</a>
<?php } if($end<$total){ ?>
	<a href="?offset=<?php echo $start+$eachpage ?>">后一页</a>
<?php } ?>
[总<font color="red"><?php echo $total ?></font>件]
</p>
</body>
</html>
