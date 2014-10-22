<?php
	if($_SESSION["username"] != "admin" ) {
?>
<script>
	function login() {
		url = "response_admin.php";
		pars = "act=login&p="+$("password").value;
		cAjax = new Ajax.Updater("notice", url,  { parameters: pars, evalScripts: true } );
	}
</script>
<div style="background:url('dot.gif') repeat;width:100%;height:100%;position:absolute;top:0px;left:0px;right:0px;text-align:center;" id="login">
	<div style="background-color:white;width:200px;height:80px;padding:20px; margin:100px auto;border: double 1px; gray;" align="left";>
		<h2>管理员登陆：</h2>
		<ul>
			<li>用户名：admin</li>
			<li>密　码：<input type="password" id="password" /></li>
			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 登 陆 " onclick="login();" /></li>
			<li>	<div id="notice" style="color:red;"></div></li>
		</ul>
	</div>
</div>
<?
	}
?>