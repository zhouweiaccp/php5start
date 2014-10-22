<?php
   /********************************/
   /*   文件名：delete.php         */
   /*   说明：管理员删除留言处理   */
   /********************************/

   require_once 'config.inc.php';

   //如果不是管理，则退出
   if(!$_SESSION['isAdmin'])
   {
      ?>
      <!--弹出信息对话框-->
      <script>
         alert("你不是管理员，请退出该页。");
         location.href="list.php";
      </script>
      <?php
      exit;
   }

   //执行删除留言操作
   $sql = "DELETE FROM guestbook WHERE id = '$_GET[id]'";

   $result = mysql_query($sql);

   $num = mysql_affected_rows($db);

   if($num>0)
      $errmsg = "留言删除成功!";
   else
      $errmsg = "留言删除失败!";

   ?>
      <!--弹出信息对话框-->
      <script>
         alert("<?php echo $errmsg ?>");
         location.href="list.php";
      </script>
   <?php
   exit;

?>
