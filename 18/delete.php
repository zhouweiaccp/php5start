<?php
   /********************************/
   /*   �ļ�����delete.php         */
   /*   ˵��������Աɾ�����Դ���   */
   /********************************/

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

   //ִ��ɾ�����Բ���
   $sql = "DELETE FROM guestbook WHERE id = '$_GET[id]'";

   $result = mysql_query($sql);

   $num = mysql_affected_rows($db);

   if($num>0)
      $errmsg = "����ɾ���ɹ�!";
   else
      $errmsg = "����ɾ��ʧ��!";

   ?>
      <!--������Ϣ�Ի���-->
      <script>
         alert("<?php echo $errmsg ?>");
         location.href="list.php";
      </script>
   <?php
   exit;

?>
