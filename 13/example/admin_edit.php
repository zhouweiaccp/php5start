<?php
require_once 'common.php';
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理界面::软件内容编辑</title>
</head>

<body>
<h2>管理界面::软件内容编辑</h2>
<?php
$current_id = intval($_REQUEST['id']);

$rs = $db->Execute("SELECT * FROM SoftwareLib WHERE id={$current_id}");

if($_POST['submit']){
	if($rs){
		$record['softname'] = $_POST['softname'];
		$record['content'] = $_POST['content'];
		$record['postdate'] = $db->DBDate(time());
		$update_query = $db->GetUpdateSQL($rs, $record, "id={$current_id}");
		$rs = $db->Execute($update_query);
		echo "记录修改成功！";
	}else{
		echo "记录修改失败！";
	}
	echo "<br>", url("admin_list.php", "返回");
}else{
	if($rs){
		$obj = $rs->fetchObject();
		$txt_id = $obj->ID;
		$txt_softname = $obj->SOFTNAME;
		$txt_content  = $obj->CONTENT;
	}
?>
	<form action="admin_edit.php" method="post">
	<input name="id" type="hidden" value="<?php echo $txt_id ?>" />
	<p>软件名称：<input name="softname" size="40" value="<?php echo $txt_softname ?>" /></p>
	<p>描述正文：<textarea name="content" cols="40" rows="5"><?php echo $txt_content ?></textarea></p>
	<p><input type="submit" name="submit"></p>
	</form>
<?php
}
?>
</body>
</html>
