<?php
  /**************************************/
  /*		�ļ�����logoff_user.php		*/
  /*		���ܣ��û��˳�����			*/
  /**************************************/

  require('config.inc.php');
  //���SESSION
  $_SESSION = array();
  session_unset();

  //���SESSION
  session_destroy();

  //��תҳ��
  header("Location: main_forum.php");
?>
