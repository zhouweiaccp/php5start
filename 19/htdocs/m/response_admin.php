<?php
	session_start();
	include("../config.inc.php");
	include(ROOT."lib/db.php");
	$act = $_REQUEST["act"];
	switch($act) {
		case	"password"		:
			password();
			break;
		case	"do_password"		:
			do_password();
			break;
		case	"logout"		:
			logout();
			break;
		case	"login"		:
			login();
			break;
		default				:
			die("参数有误");
			break;
	}
	
	function password() {
?>
<h2>修改密码</h2>
<form >
	　　管理员：
	admin
	<br />
	　　旧密码：
	<input type="password" id="old_password" />
	<br />
	　　新密码：
	<input type="password" id="new_password" />
	<br />
	重输新密码：
	<input type="password" id="re_password" />
	<br />
	<input type="button" value="  修 改  " onclick="admin('do_password');" />
</form>
<div id="notice" style="color:red;"></div>
<?php
	}	//end password
	
	function do_password() {
		$conn = getDBConnect();
		$new_password = $_POST["np"];
		$old_password = $_POST["op"];
		$sql = "select password from users where username='admin'";
		$password = $conn->getOne($sql);
		if($old_password == $password) {
			$sql = "update users set password=? where username=?";
			$rs = $conn->Execute($sql,array($new_password,"admin"));
			if($rs) {
				die("操作成功");
			}else {
				die("错误：DB操作失败");
			}
		}else {
			die("错误：旧密码错误");
		}
	}
	
	function logout() {
		session_unset();
		die("已经退出登陆");
	}
	function login() {
		$conn = getDBConnect();
		$p = $_POST["p"];
		$sql = "select password from users where username='admin'";
		$password = $conn->getOne($sql);
		if($p == $password) {
			$_SESSION["username"] = "admin";
			echo "<script>$('login').style.display='none';</script>";
		}else {
			echo "错误：密码错误";
		}

	}
?>