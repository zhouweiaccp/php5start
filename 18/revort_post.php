<?php
  /**********************************/
  /*    �ļ�����revort_post.php     */
  /*    ˵��������Ա�ظ����Դ���    */
  /**********************************/

  require_once 'config.inc.php';

  //������ǹ������˳�
  if(!$_SESSION['isAdmin'])
  {
      ?>
      <!--������Ϣ�Ի���-->
      <script>
         alert("�㲻�ǹ���Ա�����˳���ҳ��");
         location.href="list.php";
      </script>
      <?php
      exit;
  }

  $sql = "UPDATE guestbook SET revort = '$_POST[revort]', retime = NOW()
         WHERE id = $_POST[id]";

  $result = mysql_query($sql);
 
  //�жϼ�¼�Ƿ񱻸���
  $num = mysql_affected_rows($db);
  if($num>0)
      $errmsg = "���Իظ��ɹ�!";
  else
      $errmsg = "���Իظ�ʧ��!";
  
  ?>
     <!--������Ϣ�Ի���-->
      <script>
         alert("<?php echo $errmsg ?>");
         location.href="list.php";
      </script>
   <?php
   exit;
?>
