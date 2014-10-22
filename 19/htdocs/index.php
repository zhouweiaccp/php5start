<?php
	include("header.inc.php");
?>
<script type="text/javascript" src="jscript/prototype.js" ></script>
<script>
	function set_sub_category(id) {
		url = "m/response_category.php";
		pars = "act=get_sub_category&i="+id;
		cAjax = new Ajax.Updater("sub_category_con", url, { parameters: pars, evalScripts: true } );
	}
	function categoryGoto() {
		category_id = $("category").value+"_"+$("sub_category").value;
		city_id = $("city").value;
		location.href="list.php?c="+category_id+"&a="+city_id;
	}
	window.onload = function () {
		set_sub_category($("category").value);
	}
</script>
<form style="margin:0px;padding:10px;" action="list.php">
	<select onchange="set_sub_category(this.value);"  id="category">
		<?php echo category_options(); ?>
	</select>
	<span id="sub_category_con">
	</span>
	<select id="city">
		<option>选择地区</option>
<?php
	$conn = getDBConnect();
	$sql = "select * from city where parent_id=?";
	$Rs = $conn->Execute($sql,array(intval($cookie_city_id)));
	while($row = $Rs->FetchRow()) {
		echo "<option value='".$row["parent_id"]."_".$row["id"]."' >".$row["city_name"]."</option>";
	}
?>
	</select>
	&nbsp;
	<input type="button" value="进入" onclick="categoryGoto();" />
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="q" />
	<select id="search_category" name="c">
		<option value="">分类信息</option>
<?php
	$sql = "select * from category where parent_id<>0 order by parent_id";
	$Rs = $conn->Execute($sql);
	$parent_id="";
	while($row = $Rs->FetchRow()) {
		if($row["parent_id"]!=$parent_id) {
			echo "<option value='' >----------------</option>";
		}
		echo "<option value='".$row["parent_id"]."_".$row["id"]."' >".$row["category_name"]."</option>";
		$parent_id=$row["parent_id"];
	}
?>
	</select>
	<input type="submit" value="搜索" />
</form>
<div id="contents">
<?php

	$Sql = "select * from category where parent_id=0 order by id";
	$Rs = $conn->Execute($Sql);
	echo "<div class=\"message_content\">\n";
	while($row = $Rs->FetchRow()) {
		echo "<ul>\n";
		echo "<li><b>{$row[category_name]}</b></li>\n";
		printCategory($row["id"]);
		echo "</ul>\n";
	}
	echo "</div>\n";
	function printCategory($id=0) {
		$conn = getDBConnect();
		$Sql = "select * from category where parent_id=? order by id";
		$Rs = $conn->Execute($Sql,array($id));
		while($row = $Rs->FetchRow()) {
			$class = $id."_".$row["id"];
			echo "<li><a href=\"list.php?c={$class}\">{$row[category_name]}</a></li>\n";
		}
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
?>
</div>



<?php
	include("footer.inc.php");
?>