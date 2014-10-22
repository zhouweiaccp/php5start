<?php
  /**************************************/
  /*		文件名：userlist.php		*/
  /*		功能：在线用户显示页面		*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";	//包含公用头部页面
?>

<script language="JavaScript">
  //页面刷新时间（秒）
  var refreshinterval=<?php echo $refreshrate; ?>

  //是否在状态栏上显示状态 yes/no
  var displaycountdown="no"

  // Do not edit the code below
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
  			window.status="Page refreshing in "+reloadseconds+ " seconds"
  		}
      }
      else {
          clearTimeout(timer)
  		window.location.reload(true)
      }
  }
  window.onload=starttime
</script>

<font face="宋体" size="2">
<b>用户列表</b><br>

<?php
  //当前用户
  $username = $_SESSION['username'];

  //查询时间
  $last_timestamp = strtotime ("-$sessiontime minutes");
  $check_time = date('Y-m-d H:i:s', $last_timestamp);

  //获取用户列表
  $query = "SELECT * FROM chatter_users
		  WHERE time>='$check_time' ORDER BY username";
  $result = @mysql_query ($query);

  while ($rows = mysql_fetch_assoc($result))
  {
	$id_current = $rows['id'];					//ID
	$time_current = $rows['time'];				//时间
	$username_current = $rows['username'];		//用户名

	if ($username_current == $_SESSION['username'])
     {
		echo $username_current;
		echo "<br>";
	}
	else
	{
		//显示一个链接，用于私聊
		//使用urlencode()进行URL地址的编码
		$url_username = htmlentities(urlencode($username_current));
?>
<a href="#"
 onClick="openwin('private.php?to=<?=$url_username;?>',500,500)">
<?php echo "$username_current"; ?>
</a><br>

<?php
	}
  }//end while
?>

</body>
</html>
