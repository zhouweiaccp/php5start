<?php
   /****************************/
   /*   文件名：revort.php     */
   /*   说明：管理员回复页面   */
   /****************************/

   include "config.inc.php";
   include "ubbcode.inc.php";
   include"header.inc.php";

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

   $id = intval($_GET['id']);

   $sql = "SELECT * FROM guestbook WHERE id=$id";

   $result = mysql_query($sql);

   $numrows = mysql_num_rows($result);

?>

<script>
function vaildForm(obj)
{
	if(obj.keyword.value=='' || obj.keyword.value.length<3)
	{
		alert('您没有填写搜索关键词，或者您的关键词太短！\n请重新填写至少 3 个字符。');
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<table border=0 cellpadding=0 cellspacing=0 width=730 class=TitleBar>
  <tr>
    <td class=TitleBar_L></td>
    <td class=TitleBar_T> ≡ 回复留言 ≡ </td>
    <td class=TitleBar_R></td>
  </tr>
</table>
<?

   if($numrows>0)
   {
      //获取留言记录
	 $data = mysql_fetch_array($result);

      $id = $data['id'];                           //留言ID
      $hide = $data['hide'];                       //是只有管理员阅读
      $name = $data['name'];                       //用户名
      $gender = ($data['gender']) ? '男' : '女';    //性别
      $email = $data['email'];                      //电子邮件地址
      $homepage = $data['homepage'];                //主页
      $face = $data['face'];                        //头像
      $oicq = $data['oicq'];                        //OICQ号码
      $ip = $data['ip'];                            //IP地址
      $time = $data['time'];                        //发布时间
      $content = nl2br(ubbcode($data['content']));	//发布内容
      if($data['revort'])
      {
         $retime = $data['retime'];
         $revort = $data['revort'];
      }
  ?>

<!--Frame start here-->
<table border="0" cellpadding="0" cellspacing="0" width="730" class="TextBox_1">
  <tr>
    <td width="5" rowspan="4" class="Border_L"></td>
    <td height="1" class="BgLine"></td>
    <td width="5" rowspan="4" class="Border_R"></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
<td valign="top">
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" width="144">&nbsp;
        <div align="center"><strong><?php echo $name ?></strong> <br>
          <br>
          <img src="images/face/<?php echo $face ?>.gif" border=0 width=100 height=100>
       <br>
          <br>
          性别：<?php echo $gender ?><br>
          <br>
        </div></td>
      <td width="1" class="bgLine"></td>
      <td valign="top" width="575">&nbsp;
     <img alt="5345@et.com" border=0 src="images/email.gif" width=16 height=16>
     <a href="mailto:<?php echo $email ?>">信箱</a>
     <img alt="<?php echo $email ?>" src="images/home.gif" border=0 width=16 height=16>
     <a href="<?php echo $homepage ?>" target=_blank>主页</a>
     <img alt="IP 地址：<?php echo $ip ?>" border=0 src="images/ip.gif" width=16 height=15> 地址
     <img alt="<?php echo $time ?>" border=0 src="images/time.gif" width=16 height=16> 发表时间：
     	 <?php echo $time ?>

  <?php if($_SESSION['isAdmin']) { ?>
     <img src="images/delete.gif" border=0> <a href="delete.php?id=<?php echo $id ?>"
       OnClick="JavaScript: if(confirm('确实要删除这条留言吗？')) return true; else return false;" >删除</a>
  <?php } ?>

        <hr align="left" width="70%" size="1" noshade>
        <!--start Text-->
        <table border="0" width="96%" cellspacing="4" cellpadding="4">
          <tr>
            <td class="booktext"><div class="booktext"><?php echo $content ?></div></td>
          </tr>
        </table>
        <!--end Text--></td>
    </tr>
   <tr>
  <td valign="top" align="center">
  <hr align="right" width="80%" size="1" noshade>
	版主回复
  <br>
	<?php echo $retime ?>
  </td>
<td width="1" class="bgLine"></td>

<form action="revort_post.php" method="post">
<td valign="top">
  <hr align="left" width="80%" size="1" noshade>
  <textarea name="revort" rows=10 
    style="width: 400; height:200"><?php echo htmlspecialchars($revort) ?></textarea>
  <input type="submit" value="立即回复" />
  <input type="hidden" name="id" value="<?php echo $id?>" />
</td>
  </form>
</tr>
      </table></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
</table>
<!--Frame close here-->
  <?php
     }else{//endif
  ?>
    <h3>留言不存在，或者已经被删除！</h3>
  <?php
   }
  ?>

<!--底边-->
<table border="0" cellpadding="0" cellspacing="0" width="730" class="Hemline">
<tr>
  <td class="Hemline_L"></td>
  <td class="Hemline_T"><img style="width: 1; height: 0"></td>
  <td class="Hemline_R"></td>
</tr>
</table>

<!-- 搜索和分页框 -->
<table width=730 border=0 cellspacing=0 cellpadding=0 height=34>
  <tr>
    <td nowrap width=100><table border=0 cellspacing=0 cellpadding=0>
   <!-- 搜索框 -->
      <form action="list.php" method=GET OnSubmit="return vaildForm(this)">
     <tr>
      <td nowrap>&nbsp;搜索：
        <input class=text size=13 name="keyword" value="<?php echo htmlspecialchars($keyword) ?>">
        &nbsp;</td>
     </tr>
   </form>
      </table></td>
	<td align=right nowrap>
	&nbsp;
   </td>
  </tr>
</table>
<?php
include "footer.inc.php";
?>
