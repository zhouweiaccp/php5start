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
		case	"get_sub_category"	:
			getSubCategory();
			break;
		default				:
			category_list();
			break;
	}
	
	function edit() {
		$id = $_POST["i"];
		$conn = getDBConnect();
		$row = $conn->getRow("select * from category where id={$id}");
		$category_name = $row["category_name"];
		$parent_id = $row["parent_id"];
		$id = $row["id"];
		$plugin_id = $row["plugin_id"];
		if($parent_id=="0") $disabled="disabled";
?>
<h2>编辑分类</h2>
<form >
	父级分类：
	<select name="parent_id" id="parent_id" <?php echo $disabled; ?>>
		<option value="0">无</option>
<?php category_options($parent_id); ?>
	</select>
	<br />
	分类名称：
	<input type="text" name="category_name" id="category_name" value="<?php echo $category_name; ?>" />
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
	<br />
	表单类型：
	<select name="plugin_id" id="plugin_id" >
<?php plugin_options($plugin_id); ?>
	</select>
	<br />
	<input type="button" value=" 编  辑 " onclick="category('do_edit');" />
	<input type="button" value=" 删  除 " onclick="category('do_del');" />
</form>
<?php
	}	//end edit
	
	function add() {
?>
<h2>添加分类</h2>
<form >
	父级分类：
	<select name="parent_id" id="parent_id" >
		<option value="0">无</option>
<?php category_options(); ?>
	</select>
	<br />
	分类名称：
	<input type="text" name="category_name" id="category_name" />
	<br />
	表单类型：
	<select name="plugin_id" id="plugin_id" >
<?php plugin_options(); ?>
	</select>
	<br />
	<input type="button" value=" 添  加 " onclick="category('do_add');" />
</form>
<?php
	}	//end edit
	
	function do_edit() {
		$conn = getDBConnect();
		$parent_id = $_POST["p"];
		$category_name = $_POST["c"];
		$id = $_POST["i"];
		$plugin_id = $_POST["u"];
		$Update_sql = "update category set category_name=?,parent_id=?,plugin_id=? where id=?";
		$Update_data = array($category_name,$parent_id,$plugin_id,$id);
		$rs = $conn->Execute($Update_sql,$Update_data);
	} //end do_edit
	
	function do_add() {
		$conn = getDBConnect();
		$parent_id = $_POST["p"];
		$category_name = $_POST["c"];
		$plugin_id = $_POST["u"];
		$Insert_sql = "insert into category(category_name,parent_id,plugin_id) values(?,?,?)";
		$Insert_data = array($category_name,$parent_id,$plugin_id);
		$rs = $conn->Execute($Insert_sql,$Insert_data);
	}
	
	function do_del() {
		$conn = getDBConnect();
		$id = $_POST["i"];
		$Delete_sql = "delete from category where id=?";
		$Delete_data = array($id);
		$rs = $conn->Execute($Delete_sql,$Delete_data);
	}
	
	function category_list() {
		$conn = getDBConnect();
		$Sql = "select * from category order by id";
		$Rs = $conn->Execute($Sql);
		$idx = 0;
		while($row = $Rs->FetchRow()) {
			if($row["parent_id"] == "0") {
				$root_category[$row["id"]] = $row["category_name"];
			} else {
				$sub_category[$row["parent_id"]][$row["id"]] = $row["category_name"];
			}
		}
		echo "<ul>";
		foreach($root_category as $key=>$val) {
			echo "<li>";
			echo "<a href=\"javascript:category('edit','{$key}');\">";
			echo $val;
			echo "</a>";
			if(count($sub_category[$key])) {
				echo "<ul>";
				foreach($sub_category[$key] as $k=>$v) {
					echo "<li>";
					echo "<a href=\"javascript:category('edit','{$k}');\">";
					echo $v;
					echo "</a>";
					echo "</li>";
				}
				echo "</ul>";
			}
			echo "</li>";
		}
		echo "</ul>";
	}
	function category_options($parent_id="-1") {
		$conn = getDBConnect();
		$Sql = "select * from category where parent_id=0 order by id";
		$Rs = $conn->Execute($Sql);
		$idx = 0;
		$selectFlg = "";
		while($row = $Rs->FetchRow()) {
			if($row["id"] == $parent_id) {
				$selectFlg = "selected";
			}else {
				$selectFlg = "";
			}
			echo "<option value='".$row["id"]."' {$selectFlg} >".$row["category_name"]."</option>";
		}
	}
	
	function plugin_options($plugin_id) {
		include(ROOT."plugin/index.php");
		$selectFlg = "";
		foreach($plugins as $key=>$val) {
			if($key == $plugin_id) {
				$selectFlg = "selected";
			}else {
				$selectFlg = "";
			}
			echo "<option value='".$key."' {$selectFlg} >".$val["plugin_name"]."</option>";
		}
	}
	function getSubCategory() {
		$id = $_POST["i"];
		$conn = getDBConnect();
		$Sql = "select * from category where parent_id=? order by id";
		$Rs = $conn->Execute($Sql,array($id));
		$selectFlg = "";
		echo "<select id=\"sub_category\">";
		while($row = $Rs->FetchRow()) {
			if($row["id"] == $parent_id) {
				$selectFlg = "selected";
			}else {
				$selectFlg = "";
			}
			echo "<option value='".$row["id"]."' {$selectFlg} >".$row["category_name"]."</option>";
		}
		echo "</select>";
	}
?>