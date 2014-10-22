<?php
require_once 'common.php';


$current_id = intval($_GET['id']);

$rs = $db->Execute("SELECT * FROM SoftwareLib WHERE id={$current_id}");

if($rs){
	if($obj = $rs->fetchNextObject()){
		$txt_id = $obj->ID;
		$txt_softname = $obj->SOFTNAME;
		$txt_content = $obj->CONTENT;
		$txt_hitcount  = $obj->HITCOUNT;
		$txt_postdate  = $obj->POSTDATE;
		
		//更新点击量
		$record['hitcount']=$txt_hitcount+1;
		$db->Execute("UPDATE SoftwareLib SET HitCount=HitCount+1 WHERE id={$txt_id}"); 
	}else{
		exit;
	}
}
//$fid = ($current_id < 21) ? 1 : $current_id-20;
//返回临近的文章列表
$fid = $current_id;
$rs = $db->SelectLimit("SELECT id, softName FROM SoftwareLib WHERE id>=$fid-5 and id<=$fid+5 ORDER BY id", 10);
if($rs){
	while($o = $rs->fetchNextObject()){
		$lists[] = array(
			'id' => $o->ID,
			'softname' => $o->SOFTNAME
		);
	}
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $txt_softname; ?></title>
</head>

<body>
<H1><?php echo $txt_softname; ?></H1>
<p>浏览量：<font color=red><?php echo $txt_hitcount; ?></font> &nbsp; &nbsp;
更新时间：<?php echo $txt_postdate ?></p>
<p><?php echo $txt_content; ?></p>

<p>&nbsp;</p>
<center><h5>
	[ <?php echo url("index_list.php", "返回一览"); ?> ]
</h5></center>
<hr>
<p><b>近期文章</b></p>
<?php foreach($lists as $value) : ?>
	
	<li><?php echo url("?id=".$value['id'], $value['softname']); ?>

<?php endforeach; ?>
</body>
</html>

