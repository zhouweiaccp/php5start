<?php
require_once 'common.php';

//ɾ����¼
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
<title>�������::����б�</title>
</head>

<body>
<h2>�������::����б�</h2>

<p><?php echo url("admin_add.php", "��������") ?></p>

<table width="100%" border="1">
 <tr>
  <th>ID</th>
  <th>�����</th>
  <th>��¼ʱ��</th>
  <th>���</th>
  <th colspan="2">����</th>
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
			echo "  <td>" .url("admin_edit.php?id={$txt_id}", "�༭"). "</td>\n";
			echo "  <td>" .url("admin_list.php?delid={$txt_id}&page={$page}", "ɾ��", "onClick=\"return confirm('ȷʵҪɾ���ü�¼��')\""). "</td>\n";
			echo "</tr>\n";
		}
?>
</table>
<p>
	<div>
<?php
	 	$current_page = $rs->AbsolutePage();
	 	$last_page = $rs->LastPageNo();

	 	echo "��<b>" .$rs->MaxRecordCount(). "</b>����¼\n";

		if ($rs->AtFirstPage()){
			echo '[��ҳ] [��һҳ]';
		}else{
			echo '[', url('?page=' .($current_page+1), '��ҳ'), '] [',
				 url('?page=' .($current_page-1), '��һҳ', 'l'), ']';
		}

		echo "\n";

		if ($rs->AtLastPage()){
			echo '[��һҳ] [βҳ]';
		}else{
			echo '[', url('?page=' .($current_page+1), '��һҳ', 'r'),
				 '] [', url('?page=' .$last_page, 'βҳ'), ']';
		}
	 	echo "\n<font color=red>{$current_page}</font>/{$last_page}ҳ \n";
?>
</div></p>
</body>
</html>