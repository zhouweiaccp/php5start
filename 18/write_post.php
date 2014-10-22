<?php
  /********************************/
  /*   �ļ�����write_post.php     */
  /*   ˵����ǩд���ԵĴ������   */
  /********************************/

  require_once 'config.inc.php';

  //������Ϣ
  $errmsg = '';

  //��ȡ�û�IP��ַ
  if(getenv('HTTP_CLIENT_IP'))
  {
	 $ip = getenv('HTTP_CLIENT_IP');
  }
  elseif(getenv('HTTP_X_FORWARDED_FOR'))
  {
	$ip = getenv('HTTP_X_FORWARDED_FOR');
  }
  elseif(getenv('REMOTE_ADDR'))
  {
	$ip = getenv('REMOTE_ADDR');
  }
  else
  {
	$ip = $_SERVER['REMOTE_ADDR'];
  }

  $hide = ($_POST['hide']) ? 1 : 0;			//���Ļ�
  $name = $_POST['name'];					//�û���
  $gender = ($_POST['gender']) ? 1 : 0;		//�Ա�
  $email = $_POST['email'];					//�����ʼ���ַ
  $homepage = $_POST['homepage'];			//������ҳ
  $face = $_POST['face'];					//����ͷ��
  $oicq = $_POST['oicq'];					//OICQ
  $content = $_POST['content'];				//��������

  //�ж��������ȷ��
  if( trim($name, " ��\n\t\r\0\x0B")=="" )
  {
	$errmsg = "�����ǳ�û����д��\n��������д��";
  }

  elseif( !eregi("^[-a-zA-Z0-9_\x7f-\xff]+$", $name) )
  {
	$errmsg = "�����ǳư����Ƿ��ַ���\n�ǳ�ֻ������ĸ�����ֻ�����ɡ�";
  }
  elseif( strlen($name)>16 )
  {
  	$errmsg = "�����ǳ���д���淶��\n�ǳ����ֻ�ܰ��� 16 �ֽڡ�";
  }
  elseif ( $email && !eregi('[-a-z0-9_\.]+\@([0-9a-z][-a-z0-9_]+\.)+[a-z]{2,3}$', $email) )
  {
  	$errmsg = "���������ַ��д���淶��\n����ȷ��д���ĳ��������ַ��";
  }
  elseif ( $oicq && !ereg('^[0-9]{5,14}$', $oicq) )
  {
  	$errmsg = "���� OICQ ������д���淶��\n����ȷ��д���� OICQ ���롣";
  }
  elseif ( $homepage && !eregi('^http://', $homepage) )
  {
  	$errmsg = "������ҳ��ַ��д���淶��\n��ҳ��ַ�����ԡ�http://����ͷ��";
  }
  elseif ( trim($content, " ��\n\t\r\0\x0B")=="" )
  {
  	$errmsg = "�����������ݲ������հף�\n��������д��";
  }
  elseif ( strlen($content)>5000 )
  {
  	$errmsg = "������������̫���ˣ�\n��Ҫ�����Ա��ű�ѽ��";
  }

  if($errmsg)
  {
  	?>
		<!--����������Ϣ��-->
		<script>
			alert("<?php echo str_replace("\n", '\n', $errmsg); ?>");
			history.back();
		</script>
  	<?php
  }
  else
  {
  	$sql = "INSERT INTO guestbook (hide, name, gender, email, homepage,
							   oicq, face, ip, time, content)
			VALUES ('$hide', '$name', '$gender', '$email', '$homepage',
				  '$oicq', '$face', '$ip', NOW(), '$content')";

	mysql_query($sql);
  	$errmsg = "���Է���ɹ�!";

  	?>
		<!--������Ϣ�Ի���-->
		<script>
			alert("<?php echo str_replace("\n", '\n', $errmsg); ?>");
			location.href="list.php";
		</script>
  	<?php
	}

?>
