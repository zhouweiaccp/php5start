<?php
  /**************************************/
  /*		�ļ�����userlist.php		*/
  /*		���ܣ������û���ʾҳ��		*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";	//��������ͷ��ҳ��
?>

<script language="JavaScript">
  //ҳ��ˢ��ʱ�䣨�룩
  var refreshinterval=<?php echo $refreshrate; ?>

  //�Ƿ���״̬������ʾ״̬ yes/no
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

<font face="����" size="2">
<b>�û��б�</b><br>

<?php
  //��ǰ�û�
  $username = $_SESSION['username'];

  //��ѯʱ��
  $last_timestamp = strtotime ("-$sessiontime minutes");
  $check_time = date('Y-m-d H:i:s', $last_timestamp);

  //��ȡ�û��б�
  $query = "SELECT * FROM chatter_users
		  WHERE time>='$check_time' ORDER BY username";
  $result = @mysql_query ($query);

  while ($rows = mysql_fetch_assoc($result))
  {
	$id_current = $rows['id'];					//ID
	$time_current = $rows['time'];				//ʱ��
	$username_current = $rows['username'];		//�û���

	if ($username_current == $_SESSION['username'])
     {
		echo $username_current;
		echo "<br>";
	}
	else
	{
		//��ʾһ�����ӣ�����˽��
		//ʹ��urlencode()����URL��ַ�ı���
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
