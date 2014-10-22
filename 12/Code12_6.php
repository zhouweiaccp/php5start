<?php
	$conn = mysql_connect ($host, $user, $pass) or
		die ("连接数据库服务器失败！");

	mysql_select_db ($db) or
		die ("选择数据库{$db}失败！");

	//查询记录总数
	$result = mysql_query ("SELECT COUNT(*) FROM guestbook");
	$total = mysql_result ($result, 0, 0);
?>
<table width="650" border="1">
<?php
	if($total) { //如果存在记录

		//发送数据库查询语句
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
 <tr><td colspan="6">没有数据</td></tr>
<?php	
	}
?>
</table>

<?php
	//释放内存资源
	mysql_free_result ($result);

	//关闭数据库连接
	mysql_close ($conn);
?>
