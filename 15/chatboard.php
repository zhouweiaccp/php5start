<?php
  /**************************************/
  /*		文件名：chatboard.php		*/
  /*		功能：聊天内容显示页面		*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";		//包含公用头部页面
?>

<script language="JavaScript">
  //刷新时间间隔（秒）
  var refreshinterval=<?php echo $refreshrate; ?>

  //是否在状态栏上显示用户状态 yes/no
  var displaycountdown="yes"

  //系统页面刷新
  var starttime
  var nowtime
  var reloadseconds=0
  var secondssinceloaded=0

  function starttime() {
	starttime=new Date()
	starttime=starttime.getTime()
    countdown()
  }

  function countdown() {
	nowtime= new Date()
	nowtime=nowtime.getTime()
	secondssinceloaded=(nowtime-starttime)/1000
	reloadseconds=Math.round(refreshinterval-secondssinceloaded)
	if (refreshinterval>=secondssinceloaded) {
        var timer=setTimeout("countdown()",1000)
		if (displaycountdown=="yes") {
			window.status="在 "+reloadseconds+ " 秒后刷新聊天记录"
		}
    }
    else {
        clearTimeout(timer)
		window.location.reload(true)
    }
  }
  window.onload=starttime
</script>

<?php
  //功能
  $action = isset($_GET['action']) ? $_GET['action'] : 'public';
  //用户名
  $username = $_SESSION['username'];
  //私聊用户名
  $to = isset($_GET['to']) ? $_GET['to'] : '';

  //从数据库获取聊天记录
  if($action == 'public')
  {
     //公共聊天内容
	$query = "SELECT id, time, username, message
		FROM chatter_chatboard
		WHERE 1=1
		ORDER BY time DESC LIMIT $chatrows";
  }
  else	// if($action == ‘private’)
  {
	//私聊内容，有删除标记的不予读取
	$query = "SELECT id, time, fromname AS username, message
		FROM chatter_privboard
		WHERE (fromname='$username' AND toname='$to' AND delfrom=0)
		    OR (fromname='$to' AND toname='$username' AND delto=0)
		ORDER BY time DESC LIMIT $chatrows";
  }

  //根据前面的SQL语句进行查询
  $result = @mysql_query ($query);
  $num_rows = mysql_num_rows ($result);
  if($num_rows == 0)
  {
    echo "当前没有聊天记录";
  }
  else
  {
	//获得聊天记录
	while( $row_chatboard = mysql_fetch_assoc($result) )
	{
		$array_chatboard[] = $row_chatboard;
	}

	//将反序排列数据，这样可以保证留言按照符合习惯的方式排列
	$array_chatboard = array_reverse ($array_chatboard);

	foreach($array_chatboard as $row_chatboard)
	{
		$id_board = $row_chatboard['id'];
		$username_board = $row_chatboard['username'];
		$message_board = $row_chatboard['message'];
		list($date_board, $time_board) = split(" ", $row_chatboard['time']);

		//处理特殊符号
		$message_board = htmlspecialchars($message_board);

		//如果允许表情符号，将自动转换
		if($use_smilies == true){
		  $message_board = Smilies($message_board);
		}

		//处理行的颜色
		if($bgrow == 1){
			$bgcolor = "row_1";
			$bgrow = 0;
		}else{
			$bgcolor = "row_2";
			$bgrow = 1;
		}
?>
	<div class="<?php echo $bgcolor; ?>">
	<b style="color:red"><?php echo $username_board; ?></b>
		[<?php echo $time_board; ?>]
	<b>说：</b>
		<?php echo $message_board;?>
	</div>

<?php
	}
  }//end foreach
?>

</body>
</html>
