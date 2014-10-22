<html>
<head>
	<title>管理:管理选项</title>
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
		function admin(act) {
			url = "response_admin.php";
			switch(act) {
				case	"password"		:
					pars = "act=password";
					cAjax = new Ajax.Updater("admin", url,  { parameters: pars } );
					break;
				case	"do_password"		:
					old_password=$("old_password").value;
					new_password=$("new_password").value;
					re_password=$("re_password").value;
					if(new_password == "") {
						$("notice").innerHTML = "错误：请输入新密码";
						return;
					}
					if(new_password != re_password ) {
						$("notice").innerHTML = "错误：两次输入的密码不一致";
						return;
					}
					pars = "act=do_password&u=admin&np="+new_password+"&op="+old_password;
					cAjax = new Ajax.Updater("notice", url,  { parameters: pars } );
					break;
				case	"logout"		:
					pars = "act=logout";
					cAjax = new Ajax.Updater("admin", url,  { parameters: pars } );
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
<body onload="">
<?php include("admin_check.inc.php"); ?>
<h1>管理选项</h1>
<?php 
	include("nav.inc.php");
	include("admin_nav.inc.php");
?>
<div id="admin"></div>
</div>
</body>
</html>