<?php
	//�������ݿ�
	$conn = mysql_connect ($host, $user, $pass) or
		die ("�������ݿ������ʧ�ܣ�");

	//ѡ�����ݿ�
	mysql_select_db ($db) or
		die ("ѡ�����ݿ�{$db}ʧ�ܣ�");

	//�������ݿ��ѯ���
	$result = mysql_query ("SELECT * FROM guestbook ORDER BY id DESC");

	//��ѯ��¼��
	$total = mysql_num_rows ($result);
?>
<table width="650" border="1">
<tr>
  <th> ID </th>
  <th> Name </th>
  <th> Sex </th><th> URL </th>
  <th> Comment </th>
  <th> PostDTM </th>
</tr>
<?php
	if($total){
		for ($i=0; $i<$total; $i++)
		{
			$obj = mysql_fetch_object ($result);
?>
 <tr>
  <td><?php echo $obj->id ?></td>
  <td><?php echo $obj->name ?></td>
  <td><?php echo $obj->sex ?></td>
  <td><?php echo $obj->url ?></td>
  <td><?php echo $obj->comment ?></td>
  <td><?php echo $obj->postdtm ?></td>
 </tr>
<?php
		}
	}else{
?>
 <tr><td colspan="6">û������</td></tr>
<?php	
	}
?>
</table>

<?php
	//�ر����ݿ�����
    mysql_close ($conn);
?>
