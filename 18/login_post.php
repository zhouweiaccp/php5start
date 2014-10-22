<?php
   /********************************/
   /*   文件名：login_post.php     */
   /*   说明：管理员登录处理程序   */
   /********************************/

   include "config.inc.php";

   //用户登录
   if(isset($_POST['user_name']))
   {
      //判断用户登录信息与定义是否相同
	 if($_POST['user_name']==ADMIN_USER && $_POST['user_pass']==ADMIN_PASS)
      {
         $_SESSION['isAdmin'] = 1;
         ?>
         <!--弹出信息对话框-->
         <script>
            alert("欢迎管理员登录。");
            location.href="list.php";
         </script>
         <?php
         exit;
      }
      else
      {
		//用户名密码错误
         ?>
         <!--弹出信息对话框-->
         <script>
            alert("用户名或者密码错误，请重试。");
            location.href="login.php";
         </script>
         <?php
         exit;
      }
   }

   //退出登录
   if(isset($_GET['logout']) && $_GET['logout'])
   {
      unset($_SESSION['isAdmin']);
      ?>
      <!--弹出信息对话框-->
      <script>
         alert("成功退出登录。");
         location.href="login.php";
      </script>
      <?php
      exit;
   }
?>
