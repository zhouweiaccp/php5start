<html>
<head>
	<title>管理:地区管理</title>
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
		function city(act) {
			url = "response_city.php";
			switch(act) {
				case	"add"		:
					pars = "act=add";
					cAjax = new Ajax.Updater("city", url,  { parameters: pars } );
					break;
				case	"edit"		:
					pars = "act=edit&i="+arguments[1];
					cAjax = new Ajax.Updater("city", url,  { parameters: pars } );
					break;
				case	"do_add"	:
					top_id = $("top_id").value;
					l2_id = $("l2_id").value;
					if(l2_id=="0") {
						parent_id=top_id;
					}else {
						parent_id=l2_id;
					}
					city_name = $("city_name").value;
					pars = "act=do_add&p="+parent_id+"&c="+city_name;
					cAjax = new Ajax.Updater("city", url, { parameters: pars } );
					break;
				case	"do_edit"	:
					city_name = $("city_name").value;
					id = $("id").value;
					pars = "act=do_edit&c="+city_name+"&i="+id;
					cAjax = new Ajax.Updater("city", url, { parameters: pars } );
					break;
				case	"do_del"	:
					if(confirm("确认删除这个地区？")) {
						id = $("id").value;
						pars = "act=do_del&i="+id;
						cAjax = new Ajax.Updater("city", url, { parameters: pars } );
					}
					break;
				default				:
					pars = "act=city_list";
					cAjax = new Ajax.Updater("city", url,  { parameters: pars } );
					break;
			}
		}	//end city
		function err() {
			alert("处理出错");
		}
		
		function build_l2_menu(v) {
			pars = "act=getL2&i="+v;
			cAjax = new Ajax.Request('response_city.php', {parameters: pars, onComplete:build_list} );
		}
		function build_list(req) {
			$("l2_id").innerHTML = req.responseText;
		}
	</script>
</head>
<body onload="city()">
<?php include("admin_check.inc.php"); ?>
<h1>地区管理</h1>
<?php 
	include("nav.inc.php");
	include("city_nav.inc.php");
?>
<div id="city"></div>
</div>
</body>
</html>