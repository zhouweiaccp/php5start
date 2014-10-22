<?php
	include("header.inc.php");
?>
<br /><br />
<div id="contents">
<?php
	$conn = getDBConnect();
	$message_id = $_GET["i"];
	$rs = $conn->Execute("select * from message where id=?",array($message_id));
	if(!$rs) {
		echo "无信息，可能该信息已被删除";
		exit;
	}
	$row = $rs->FetchRow();
	$city_name = getCityName($row["city_id"]);
	$category_name = getCategoryName($row["category_id"]);
?>
<hr />
地区：<span><?php echo $city_name; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;类别：<span><?php echo $category_name; ?></span>
<hr />
	<div id="box_mobi_left">
		<div class="left_info_box1"><b class="text_14"><?php echo $row["title"]; ?></b></div>
		<div class="left_info_box2_top text_gray">发布时间：<?php echo $row["time"]; ?></div>

		<div class="left_info_box2_static">
			<ul>
				<li>&nbsp;</li>
				<li class="text_14"><?php echo $row["content"]; ?></li>
			</ul>

			<ul>
				<li>&nbsp;</li>
				<li class="text_gray text_14"><b>电话：</b><span class="text_14"><?php echo $row["tel"]; ?></span></li>
				<li class="text_gray text_14"><b>邮件地址：</b><span class="text_14"><?php echo $row["mail"]; ?></span></li>
			</ul>
		</div>
	</div>
</div>
<?php
	function getCityName($id) {
		$city_str = "";
		$citys = explode("_",$id);
		foreach($citys as $v) {
			if($v=="") continue;
			$c[] = $v;
		}
		$sql_cond = implode(",",$c);
		$sql = "select * from city where id in({$sql_cond}) order by id";
		$conn = getDBConnect();
		$rs = $conn->Execute($sql);
		while($row = $rs->FetchRow() ) {
			$city_str .= $row["city_name"]."&nbsp;";
		}
		return $city_str;
	}
	function getCategoryName($id) {
		$str = "";
		$s = explode("_",$id);
		foreach($s as $v) {
			if($v=="") continue;
			$c[] = $v;
		}
		$sql_cond = implode(",",$c);
		$sql = "select * from category where id in({$sql_cond}) order by id";
		$conn = getDBConnect();
		$rs = $conn->Execute($sql);
		while($row = $rs->FetchRow() ) {
			$str[] = $row["category_name"];
		}
		return implode("&nbsp;-&nbsp;",$str);
	}
	include("footer.inc.php");
?>