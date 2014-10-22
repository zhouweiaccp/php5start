<?php
	include("config.inc.php");
	include("functions.inc.php");
	include(ROOT."lib/db.php");
	$act = $_POST["act"];
	switch($act) {
		case	"add_message"	:
			add_message();
			break;
		case	"submit"		:
			submit_message();
			break;
		case	"get_sub_city"	:
			getSubCity();
			break;
		default					:
			echo "没有传入参数";
			break;
	}
	
	function submit_message() {
		$title = $_POST["t"];
		$content = $_POST["c"];
		$email = $_POST["e"];
		$tel = $_POST["p"];
		$city_id = $_POST["y"];
		$category_id = $_POST["a"];
		$conn = getDBConnect();
		$insert_sql = "insert into message(title,content,mail,tel,time,ip_addr,city_id,category_id)";
		$insert_sql .=" values(?,?,?,?,?,?,?,?)";
		$insert_data = array($title,$content,$email,$tel,date("Y-m-d H:i:s"),$_SERVER["REMOTE_ADDR"],$city_id,$category_id);
		$rs = $conn->Execute($insert_sql,$insert_data);
		if($rs) {
			echo "信息发布成功";
		}else {
			echo "发布失败，DB错误，请联系管理员";
		}
	}
	
	function add_message() {
		list($city_id,$city_name) = getCity();
		$id = $_POST["i"];
		$conn = getDBConnect();
		$row = $conn->getRow("select * from category where id={$id}");
		$category_name = $row["category_name"];
		$parent_id = $row["parent_id"];
		$id = $row["id"];
		$plugin_id = $row["plugin_id"];
		$p = getPluginFileName($plugin_id);
		list($city_id,$city_name) = getCity();
		$sql = "select * from category where id={$parent_id}";
		$row=$conn->getRow($sql);
		$parent_name = $row["category_name"];
		$class_name = "分类：".$parent_name." - ".$category_name;
		$category_id = $parent_id."_".$id;
		$city_options = city_options($_COOKIE["city_id"]);
		echo "<hr />";
		include($p);
		echo "<hr />";
	}
	
	function getPluginFileName($id) {
		include(ROOT."plugin/index.php");
		$cur = $plugins[$id];
		return ROOT."plugin/".$cur["file_name"];
	}
	
	function city_options($parent_id="0",$id="-1") {
		$conn = getDBConnect();
		$Sql = "select * from city where parent_id=? order by id";
		$Rs = $conn->Execute($Sql,array($parent_id));
		$selectFlg = "";
		$result = "";
		while($row = $Rs->FetchRow()) {
			if($row["id"] == $id) {
				$selectFlg = "selected";
			}else {
				$selectFlg = "";
			}
			$result .= "<option value='".$row["id"]."' {$selectFlg} >".$row["city_name"]."</option>";
		}
		return $result;
	}
	
	function getSubCity() {
		$id = $_POST["i"];
		echo "<select id='sub_city_id'  size='10' style='width:150px;height:100px;'>";
		echo city_options($id);
		echo "</select>";
	}
?>