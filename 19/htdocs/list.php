<?php
	include("header.inc.php");
?>
<form style="margin:0px;padding:10px;" action="list.php">
	关键词：
	<input type="text" name="q" value="<?php echo $_GET[q]; ?>" />
	<select id="city">
		<option>选择地区</option>
<?php
	$conn = getDBConnect();
	$sql = "select * from city where parent_id=?";
	$Rs = $conn->Execute($sql,array(intval($_COOKIE["city_id"])));
	while($row = $Rs->FetchRow()) {
		if($_GET["a"] == ($row["parent_id"]."_".$row["id"])) {
			$selectFlg = "selected";
		}else {
			$selectFlg = "";
		}
		echo "<option value='".$row["parent_id"]."_".$row["id"]."' {$selectFlg} >".$row["city_name"]."</option>";
	}
?>
	</select>
	<select name="c">
		<option value="">分类信息</option>
<?php
	$sql = "select * from category where parent_id<>0 order by parent_id";
	$Rs = $conn->Execute($sql);
	$parent_id="";
	while($row = $Rs->FetchRow()) {
		if($row["parent_id"]!=$parent_id) {
			echo "<option value='' >----------------</option>";
		}
		if($_GET["c"] == ($row["parent_id"]."_".$row["id"])) {
			$selectFlg = "selected";
		}else {
			$selectFlg = "";
		}
		echo "<option value='".$row["parent_id"]."_".$row["id"]."' {$selectFlg} >".$row["category_name"]."</option>";
		$parent_id=$row["parent_id"];
	}
?>
	</select>
	<input type="submit" value="搜索" />
</form>
<div id="contents">
<?php
	$conn = getDBConnect();
	$cond = "";
	$class_id = trim($_GET["c"]," _");
	$city_id = trim($_GET["a"]," _");
	$q = trim($_GET["q"]);
	if($class_id) {
		$class_arr = explode("_",$class_id);
		if($class_arr[1]=="") {
			$class_id=$class_id."\\_%";
		}
		$cond .= " and category_id like '{$class_id}' ";
	}
	if($city_id) {
		$city_arr = explode("_",$city_id);
		if($city_arr[1]=="" || $city_arr[2] == "") {
			$city_id=$city_id."\\_%";
		}
		$cond .= " and city_id like '{$city_id}' ";
	}
	if($q) {
		$cond .= " and title like '%{$q}%' or content like '%{$q}%' ";
	}
	if($cond=="") {
		die("没有检索条件");
	}
	$Sql = "select * from message where 1 {$cond}";
	$Rs = $conn->Execute($Sql);
	echo "<div class=\"message_content\">\n";
	while($row = $Rs->FetchRow()) {
		echo "<div class=\"box_mobi_left_info\">\n";
		echo "<div class=\"info_title\"><a href=\"message.php?i={$row[id]}\" target=\"_blank\">{$row[title]}&nbsp;</a></div>";
		echo "<div class=\"info_time\">{$row[time]}</div><br />";
		echo "<div class=\"info_Content\">{$row[content]}</div>";
		echo "</div>\n";
	}
	echo "</div>\n";
	//echo $Sql;
?>
</div>
<?php
	include("footer.inc.php");
?>