<?php
	//连接数据库
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");

	//选择数据库
	mysql_select_db ($db) or
		die ("选择数据库{$db}失败！");

	//发送数据库查询语句
	$result = mysql_query ("SELECT * FROM guestbook ORDER BY id DESC");

	//查询记录数
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
 <tr><td colspan="6">没有数据</td></tr>
<?php	
	}
?>
</table>

<?php
	//关闭数据库连接
    mysql_close ($conn);
?>
