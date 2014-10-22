<?php
require_once 'common.php';

//删除记录
if($_GET['delid']){
	$delid = intval($_GET['delid']);
	$rs = $db->Execute("DELETE FROM SoftwareLib WHERE id={$delid}");
}

$page = intval($_GET['page']);
$page =  ($page) ? $page : 1;
$offset = EACH_PAGE*($page -1);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理界面::软件列表</title>
</head>

<body>
<h2>管理界面::软件列表</h2>

<p><?php echo url("admin_add.php", "添加新软件") ?></p>

<table width="100%" border="1">
 <tr>
  <th>ID</th>
  <th>软件名</th>
  <th>登录时间</th>
  <th>浏览</th>
  <th colspan="2">操作</th>
 </tr>
<?php
		$rs = $db->PageExecute("SELECT Id, SoftName, PostDate, HitCount FROM SoftwareLib ORDER BY id DESC", EACH_PAGE, $page);
		while($o = $rs->fetchNextObject()){
			$txt_id = $o->ID;
			$txt_softname = $o->SOFTNAME;
			$txt_hitcount = $o->HITCOUNT;
			$txt_postdate = $o->POSTDATE;

			echo "<tr>\n";
			echo "  <td>$txt_id</td>\n";
			echo "  <td>$txt_softname</td>\n";
			echo "  <td>$txt_postdate</td>\n";
			echo "  <td>$txt_hitcount</td>\n";
			echo "  <td>" .url("admin_edit.php?id={$txt_id}", "编辑"). "</td>\n";
			echo "  <td>" .url("admin_list.php?delid={$txt_id}&page={$page}", "删除", "onClick=\"return confirm('确实要删除该记录？')\""). "</td>\n";
			echo "</tr>\n";
		}
?>
</table>
<p>
	<div>
<?php
	 	$current_page = $rs->AbsolutePage();
	 	$last_page = $rs->LastPageNo();

	 	echo "共<b>" .$rs->MaxRecordCount(). "</b>条记录\n";

		if ($rs->AtFirstPage()){
			echo '[首页] [上一页]';
		}else{
			echo '[', url('?page=' .($current_page+1), '首页'), '] [',
				 url('?page=' .($current_page-1), '上一页', 'l'), ']';
		}

		echo "\n";

		if ($rs->AtLastPage()){
			echo '[下一页] [尾页]';
		}else{
			echo '[', url('?page=' .($current_page+1), '下一页', 'r'),
				 '] [', url('?page=' .$last_page, '尾页'), ']';
		}
	 	echo "\n<font color=red>{$current_page}</font>/{$last_page}页 \n";
?>
</div></p>
</body>
</html>