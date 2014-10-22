<?php
	include("../config.inc.php");
	include(ROOT."lib/db.php");
	$act = $_REQUEST["act"];
	switch($act) {
		case	"add"		:
			add();
			break;
		case	"edit"		:
			edit();
			break;
		case	"do_add"	:
			do_add();
			break;
		case	"do_edit"	:
			do_edit();
			break;
		case	"do_del"	:
			do_del();
			break;
		case	"getL2"	:
			getL2();
			break;
		default				:
			city_list();
			break;
	}
	
	function edit() {
		$id = $_POST["i"];
		$conn = getDBConnect();
		$row = $conn->getRow("select * from city where id={$id}");
		$city_name = $row["city_name"];
		$parent_id = $row["parent_id"];
		$id = $row["id"];
		if($parent_id=="0") $disabled="disabled";
?>
<h2>编辑地区</h2>
<form >
	<input type="text" name="city_name" id="city_name" value="<?php echo $city_name; ?>" />
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
	<br /><br />
	<input type="button" value=" 编  辑 " onclick="city('do_edit');" />
	<input type="button" value=" 删  除 " onclick="city('do_del');" />
</form>
<?php
	}	//end edit
	
	function add() {
?>
<h2>添加地区</h2>
<form >
	城市：
	<select name="top_id" id="top_id" onchange="build_l2_menu(this.value);" >
		<option value="0">无</option>
<?php city_options(); ?>
	</select>
	县：
	<select name="l2_id" id="l2_id" >
		<option value="0">无</option>
	</select>
	<br /><br />
	<input type="text" name="city_name" id="city_name" />
	<input type="button" value=" 添  加 " onclick="city('do_add');" />
	<br />
	<hr />
	提示，当城市和县设置为“无”时，添加城市信息。当选择了城市，县设置为“无”时，添加县信息。都选择就添另区信息。
</form>
<?php
	}	//end edit
	
	function do_edit() {
		$conn = getDBConnect();
		$city_name = $_POST["c"];
		$id = $_POST["i"];
		$Update_sql = "update city set city_name=? where id=?";
		$Update_data = array($city_name,$id);
		$rs = $conn->Execute($Update_sql,$Update_data);
	} //end do_edit
	
	function do_add() {
		$conn = getDBConnect();
		$parent_id = $_POST["p"];
		$city_name = $_POST["c"];
		$Insert_sql = "insert into city(city_name,parent_id) values(?,?)";
		$Insert_data = array($city_name,$parent_id);
		$rs = $conn->Execute($Insert_sql,$Insert_data);
	}
	
	function do_del() {
		$conn = getDBConnect();
		$id = $_POST["i"];
		$Delete_sql = "delete from city where id=?";
		$Delete_data = array($id);
		$rs = $conn->Execute($Delete_sql,$Delete_data);
	}
	
	function city_list($pid=0) {
		$conn = getDBConnect();
		$Sql = "select * from city where parent_id=? order by id";
		$Rs = $conn->Execute($Sql,array($pid));
		$idx = 0;
		echo "<ul>";
		while($row = $Rs->FetchRow()) {
			echo "<li>";
			echo "<a href=\"javascript:city('edit','{$row[id]}');\">";
			echo $row["city_name"];
			echo "</a>";
			echo "</li>";
			city_list($row["id"]);
		}
		echo "</ul>";
	}
	
	function city_options($parent_id="0",$id="-1") {
		$conn = getDBConnect();
		$Sql = "select * from city where parent_id=? order by id";
		$Rs = $conn->Execute($Sql,array($parent_id));
		$idx = 0;
		$selectFlg = "";
		while($row = $Rs->FetchRow()) {
			if($row["id"] == $id) {
				$selectFlg = "selected";
			}else {
				$selectFlg = "";
			}
			echo "<option value='".$row["id"]."' {$selectFlg} >".$row["city_name"]."</option>";
		}
	}
	
	function getL2() {
		$conn = getDBConnect();
		$id = $_POST["i"];
		$Sql = "select * from city where parent_id=? order by id";
		$Rs = $conn->Execute($Sql,$id);
		echo "<option value=\"0\">无</option>";
		while($row = $Rs->FetchRow()) {
			echo "<option value='".$row["id"]."' >".$row["city_name"]."</option>";
		}
	}
?>