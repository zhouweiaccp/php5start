<?php
	/*************************************************/
	/*	�ļ�����mailist.php				*/
	/*	���ܣ���IMAP����POP3������	*/
	/*************************************************/

	//�û������������Ϣ
	$host = "pop3.163.com";
	$port = 110;
	$user = 'username';
	$pass = 'password';
	
	//��������
	$spec = sprintf("{%s:%s/pop3}INBOX", $host, $port);
	$imap = imap_open($spec, $user, $pass)
		or die('����POP3����������');
	
	//�������
	$inbox = imap_check($imap);

	//ÿҳ��ʾ���ʼ���
	$eachpage = 10;

	//���ż���
	$total = $inbox->Nmsgs;

	//�б����ʼֵ
	$start = ($_GET['offset']) ? $_GET['offset'] : 1;
	if($start>=$total) $start = $total;
	if($start<=1) $start = 1;

	//�б������ֵ
	$end = $start + $eachpage -1;
	if($end>=$total) $end = $total;
	if($end<=1) $end = 1;

	//����
	$sequence = "$start:$end";
	$overviews = imap_fetch_overview($imap, $sequence, FT_UID);

	//�ر��ʼ�����������
	imap_close($imap);
?>
<html>
<head>
<title>�ʼ��б�</title>
</head>
<body>
<table width="100%" border="1">
  <tr>
    <th scope="col">�ʼ�����</th>
    <th scope="col">������</th>
    <th scope="col">����ʱ��</th>
    <th scope="col">�ֽ�</th>
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
	<a href="?offset=<?php echo $start-$eachpage ?>">��һҳ</a>
<?php } if($end<$total){ ?>
	<a href="?offset=<?php echo $start+$eachpage ?>">��һҳ</a>
<?php } ?>
[��<font color="red"><?php echo $total ?></font>��]
</p>
</body>
</html>
