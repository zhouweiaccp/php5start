<?php
require_once 'common.php';
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������::������ݱ༭</title>
</head>

<body>
<h2>�������::������ݱ༭</h2>
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
		echo "��¼�޸ĳɹ���";
	}else{
		echo "��¼�޸�ʧ�ܣ�";
	}
	echo "<br>", url("admin_list.php", "����");
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
	<p>������ƣ�<input name="softname" size="40" value="<?php echo $txt_softname ?>" /></p>
	<p>�������ģ�<textarea name="content" cols="40" rows="5"><?php echo $txt_content ?></textarea></p>
	<p><input type="submit" name="submit"></p>
	</form>
<?php
}
?>
</body>
</html>
