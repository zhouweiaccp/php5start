<?php
   /********************************/
   /*   �ļ�����login_post.php     */
   /*   ˵��������Ա��¼�������   */
   /********************************/

   include "config.inc.php";

   //�û���¼
   if(isset($_POST['user_name']))
   {
      //�ж��û���¼��Ϣ�붨���Ƿ���ͬ
	 if($_POST['user_name']==ADMIN_USER && $_POST['user_pass']==ADMIN_PASS)
      {
         $_SESSION['isAdmin'] = 1;
         ?>
         <!--������Ϣ�Ի���-->
         <script>
            alert("��ӭ����Ա��¼��");
            location.href="list.php";
         </script>
         <?php
         exit;
      }
      else
      {
		//�û����������
         ?>
         <!--������Ϣ�Ի���-->
         <script>
            alert("�û�������������������ԡ�");
            location.href="login.php";
         </script>
         <?php
         exit;
      }
   }

   //�˳���¼
   if(isset($_GET['logout']) && $_GET['logout'])
   {
      unset($_SESSION['isAdmin']);
      ?>
      <!--������Ϣ�Ի���-->
      <script>
         alert("�ɹ��˳���¼��");
         location.href="login.php";
      </script>
      <?php
      exit;
   }
?>
