<?php
  /**************************************/
  /*		�ļ�����chatboard.php		*/
  /*		���ܣ�����������ʾҳ��		*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";		//��������ͷ��ҳ��
?>

<script language="JavaScript">
  //ˢ��ʱ�������룩
  var refreshinterval=<?php echo $refreshrate; ?>

  //�Ƿ���״̬������ʾ�û�״̬ yes/no
  var displaycountdown="yes"

  //ϵͳҳ��ˢ��
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
			window.status="�� "+reloadseconds+ " ���ˢ�������¼"
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
  //����
  $action = isset($_GET['action']) ? $_GET['action'] : 'public';
  //�û���
  $username = $_SESSION['username'];
  //˽���û���
  $to = isset($_GET['to']) ? $_GET['to'] : '';

  //�����ݿ��ȡ�����¼
  if($action == 'public')
  {
     //������������
	$query = "SELECT id, time, username, message
		FROM chatter_chatboard
		WHERE 1=1
		ORDER BY time DESC LIMIT $chatrows";
  }
  else	// if($action == ��private��)
  {
	//˽�����ݣ���ɾ����ǵĲ����ȡ
	$query = "SELECT id, time, fromname AS username, message
		FROM chatter_privboard
		WHERE (fromname='$username' AND toname='$to' AND delfrom=0)
		    OR (fromname='$to' AND toname='$username' AND delto=0)
		ORDER BY time DESC LIMIT $chatrows";
  }

  //����ǰ���SQL�����в�ѯ
  $result = @mysql_query ($query);
  $num_rows = mysql_num_rows ($result);
  if($num_rows == 0)
  {
    echo "��ǰû�������¼";
  }
  else
  {
	//��������¼
	while( $row_chatboard = mysql_fetch_assoc($result) )
	{
		$array_chatboard[] = $row_chatboard;
	}

	//�������������ݣ��������Ա�֤���԰��շ���ϰ�ߵķ�ʽ����
	$array_chatboard = array_reverse ($array_chatboard);

	foreach($array_chatboard as $row_chatboard)
	{
		$id_board = $row_chatboard['id'];
		$username_board = $row_chatboard['username'];
		$message_board = $row_chatboard['message'];
		list($date_board, $time_board) = split(" ", $row_chatboard['time']);

		//�����������
		$message_board = htmlspecialchars($message_board);

		//������������ţ����Զ�ת��
		if($use_smilies == true){
		  $message_board = Smilies($message_board);
		}

		//�����е���ɫ
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
	<b>˵��</b>
		<?php echo $message_board;?>
	</div>

<?php
	}
  }//end foreach
?>

</body>
</html>
