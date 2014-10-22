<html>
<head>
	<title>管理:分类管理</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
    body {
	margin:10;
	padding:0;
	font: 12px/1.5em Verdana;
}

input,select {
	font: 12px Verdana;
}
h2 {
	font: bold 14px Verdana, Arial, Helvetica, sans-serif;
	color: #000;
	margin: 0px;
	padding: 0px 0px 0px 15px;
}
  #login ul{margin:0;padding:0;list-style-type:none}
</style>
	<script type="text/javascript" src="../jscript/prototype.js" ></script>
	<script>
<?php
		if($debug) echo "debug=true;";
?>
		function category(act) {
			url = "response_category.php";
			switch(act) {
				case	"add"		:
					pars = "act=add";
					cAjax = new Ajax.Updater("category", url,  { parameters: pars } );
					if(debug==true) {
						$("debug").style.display="block";
						$("debug_content").value = $("category").innerHTML;
					}
					break;
				case	"edit"		:
					pars = "act=edit&i="+arguments[1];
					cAjax = new Ajax.Updater("category", url,  { parameters: pars } );
					break;
				case	"do_add"	:
					parent_id = $("parent_id").value;
					category_name = $("category_name").value;
					plugin_id = $("plugin_id").value;
					pars = "act=do_add&p="+parent_id+"&c="+category_name+"&u="+plugin_id;
					cAjax = new Ajax.Updater("category", url, { parameters: pars } );
					break;
				case	"do_edit"	:
					parent_id = $("parent_id").value;
					category_name = $("category_name").value;
					id = $("id").value;
					plugin_id = $("plugin_id").value;
					pars = "act=do_edit&p="+parent_id+"&c="+category_name+"&i="+id+"&u="+plugin_id;
					cAjax = new Ajax.Updater("category", url, { parameters: pars } );
					break;
				case	"do_del"	:
					if(confirm("确认删除这个分类？")) {
						id = $("id").value;
						pars = "act=do_del&i="+id;
						cAjax = new Ajax.Updater("category", url, { parameters: pars } );
					}
					break;
				default				:
					pars = "act=category_list";
					cAjax = new Ajax.Updater("category", url,  { parameters: pars } );
					break;
			}
		}	//end category
		function err() {
			alert("处理出错");
		}
	</script>
</head>
<body onload="category();">
<?php include("admin_check.inc.php"); ?>
<h1>分类管理</h1>
<?php 
	include("nav.inc.php");
	include("category_nav.inc.php");
?>
<div id="category"></div>
<div id="debug" style="display:none;"><textarea id="debug_content" rows="10" style="width:100%"></textarea></div>
</div>
</body>
</html>