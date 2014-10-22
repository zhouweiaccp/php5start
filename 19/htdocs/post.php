<?php
	include("header.inc.php");
?>
<script type="text/javascript" src="jscript/prototype.js" ></script>
<script>
	function add_message(id) {
		url = "response_post.php";
		pars = "act=add_message&i="+id;
		cAjax = new Ajax.Updater("contents", url, { parameters: pars, evalScripts: true } );
		$("notice").innerHTML = "请填写发布信息内容：";
	}
	function submit_message(title,content,email,tel,city_id,category_id) {
		url = "response_post.php";
		pars = "act=submit&t="+title+"&c="+content+"&e="+email+"&p="+tel+"&y="+city_id+"&a="+category_id;
		cAjax = new Ajax.Updater("contents", url, { parameters: pars } );
	}
	function sub_city(id) {
		url = "response_post.php";
		pars = "act=get_sub_city&i="+id;
		cAjax = new Ajax.Updater("sub_city", url, { parameters: pars, evalScripts: true } );
	}
</script>
发布信息<br />
<img src="images/post_tips.gif" />
<hr /><br />
<span id="notice">请选择您要发布信息的相应分类：</span><br /><br />
<div id="contents">
<?php
	$conn = getDBConnect();
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
			echo "<li><a href=\"javascript:add_message('{$row[id]}');\">{$row[category_name]}</a></li>\n";
		}
	}
?>
</div>
<?php
	include("footer.inc.php");
?>