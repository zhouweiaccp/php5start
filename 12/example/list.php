<?php
    /*******************************/
    /*  �ļ�����list.php	       */
    /*  ���ܣ���ʾ���Ժͷ�ҳ	   */
    /*******************************/

	include "dbconnect.php";

	//��ǰҳ��
	$page = isset($_GET['page'])?intval($_GET['page']):1;

	//ÿҳ��¼��
	$each_page = 5;

	//��ѯ��������
	$res = mysql_query("SELECT COUNT(*) FROM guestbook WHERE 1=1");
	$total = mysql_result($res, 0);

	//��ҳ��
	$total_page = ceil($total/$each_page);

	//������ʵ��ҳ����ʹ��ҳ����������1��$total_page֮��
	$page = ($page<0)?1:$page;
	$page = ($page>$total_page)?$total_page:$page;

	//������ʵ��ҳ��ֵ������ƫ����
	$offset = ($page-1)*$each_page;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ǩд����</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<input type="button" value=" ǩд���� " onClick="location.href='write.php'">
 <table width="90%" border="0" cellpadding="4" cellspacing="1">
  <tr>
   <td colspan="2" class="HeaderRow">�����б�
	(<?php echo sprintf("%d��¼ %d/%dҳ",$total, $page, $total_page) ?>)</td>
  </tr>
<?php
	if($total)
	{
		//�������Լ�¼
		$sql = "SELECT * FROM guestbook WHERE 1=1
			  ORDER BY postdtm DESC limit $offset, $each_page";
		$res = mysql_query($sql);
		$i = 0;

		//�����������
		while($row = mysql_fetch_object($res))
		{
			//ѭ�����˫ɫ���
			$tmp = ($i++)%2;
?>
  <tr>
   <td width="25%" valign="top" class="InputRow<?php echo $tmp ?>">
	<b><?php echo htmlspecialchars($row->name) ?></b><br>
	�Ա�<?php echo ($row->sex)?"˧��":"��ü" ?><br>
	<a href="mailto:<?php echo htmlspecialchars($row->email) ?>">�����ʼ�</a><br>
    <?php if($row->url){ ?>
		<a href="<?php echo htmlspecialchars($row->url) ?>" target="_blank">
		������ҳ</a>
	<?php } ?>
   </td>
   <td width="75%" valign="top" class="InputRow<?php echo $tmp ?>">
<div align="right">
	<a href="edit.php?id=<?php echo $row->id ?>">�༭</a>
	 |
	<a href="del.php?id=<?php echo $row->id ?>">ɾ��</a>
</div>
<hr size="1">
	<!-- �������� -->
	<?php echo $row->comment ?>
	</td>
  </tr>
<?php } ?>

<?php }else{ ?>
  <tr><td colspan="2" class="SubTitleRow" align="center">
	<b>�������ݲ�����!</b></td></tr>
<?php } ?>

  <tr>
   <td colspan="2" align="center">
	<?php
		if($page>1){
			//���ҳ������1���򼤻���ʾ��ǰһҳ���İ�ť
	?>
	    <input type="button" value=" ǰһҳ "
			onClick="location.href='?page=<?php echo $page-1 ?>'">
	<?php
		}else{
			//����Ǽ�����ʾ��ǰһҳ���İ�ť
	?>
	    <input type="button" disabled value=" ǰһҳ ">
	<?php } ?>

	 &nbsp;

	<?php
		if($page<$total_page){
			//���ҳ��������ҳ�����򼤻���ʾ����һҳ���İ�ť
	?>
		<input type="button" value=" ��һҳ "
			onClick="location.href='?page=<?php echo $page+1 ?>'">
	<?php
		}else{
			//����Ǽ�����ʾ����һҳ���İ�ť
	?>
	    <input type="button" disabled value=" ��һҳ ">
	<?php } ?>

   </td>
  </tr>
</table>
</body>
</html>
