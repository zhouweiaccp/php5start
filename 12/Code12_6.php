<?php
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	mysql_select_db ($db) or
		die ("ѡ�����ݿ�{$db}ʧ�ܣ�");

	//��ѯ��¼����
	$result = mysql_query ("SELECT COUNT(*) FROM guestbook");
	$total = mysql_result ($result, 0, 0);
?>
<table width="650" border="1">
<?php
	if($total) { //������ڼ�¼

		//�������ݿ��ѯ���
		$result = mysql_query ("SELECT * FROM guestbook ORDER BY id DESC");
		for ($i=0; $i<$total; $i++)
		{
			$id		 = mysql_result ($result, $i, 'id');
			$name	 = mysql_result ($result, $i, 'name');
			$sex		 = mysql_result ($result, $i, 'sex');
			$url		 = mysql_result ($result, $i, 'url');
			$comment = mysql_result ($result, $i, 'comment');
			$postdtm	 = mysql_result ($result, $i, 'postdtm');
?>
 <tr>
  <td><?php echo $id ?></td>
  <td><?php echo $name ?></td>
  <td><?php echo $sex ?></td>
  <td><?php echo $url ?></td>
  <td><?php echo $comment ?></td>
  <td><?php echo $postdtm ?></td>
 </tr>
<?php
		} //end for
	} else {
?>
 <tr><td colspan="6">û������</td></tr>
<?php	
	}
?>
</table>

<?php
	//�ͷ��ڴ���Դ
	mysql_free_result ($result);

	//�ر����ݿ�����
	mysql_close ($conn);
?>
