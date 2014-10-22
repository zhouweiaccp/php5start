<?php
  /************************/
  /*   文件名：list.php   */
  /*   说明：留言列表     */
  /************************/

   include "config.inc.php";
   include"ubbcode.inc.php";
   include"header.inc.php";

   $each_page = EACH_PAGE;              //每页最多显示留言数
   $offset = intval($_GET['offset']);   //记录偏移量
   $keyword = $_GET['keyword'];         //关键字，用于留言搜索

   //构造检索条件
   if($keyword)
   {
      $where = "content LIKE '%$keyword%' OR revort LIKE '%$keyword%' ";
      $title = "搜索结果";
   }
   else
   {
      $where = "1=1";
      $title = "最新留言";
   }

   //总记录数
   $sql = "SELECT Count(*) FROM guestbook WHERE $where";
   $result = mysql_query($sql);
   $row = mysql_fetch_row($result);
   $total = $row[0];

   //规范$offset
   if($offset<0)
      $offset = 0;
   elseif($offset > $total)
      $offset = $total;

   $result = mysql_query($sql);

   //查询当前页记录
   $sql = "SELECT * FROM guestbook WHERE $where ORDER BY id DESC
         LIMIT $offset, $each_page";

   $result = mysql_query($sql);

   //查询的记录数
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

<!--标题-->
<table border=0 cellpadding=0 cellspacing=0 width=730 class=TitleBar>
  <tr>
    <td class=TitleBar_L></td>
    <td class=TitleBar_T> ≡ <?php echo $title ?> ≡ </td>
    <td class=TitleBar_R></td>
  </tr>
</table>
<?php

   if($numrows>0)
   {
   $tmp = 0;

   /* 循环遍历数组，输出列表 */
   while($data = mysql_fetch_array($result))
   {
      $tmp ++;
      $bg_style = ($tmp%2)+1;                       //表格背景样式
      $id = $data['id'];                            //留言ID
      $hide = $data['hide'];                        //是只有管理员阅读
      $name = $data['name'];                        //用户名
      $gender = ($data['gender']) ? '男' : '女';     //性别
      $email = $data['email'];                      //电子邮件地址
      $homepage = $data['homepage'];                //主页
      $face = $data['face'];                        //头像
      $oicq = $data['oicq'];                        //OICQ号码
      $ip = $data['ip'];                            //IP地址
      $time = $data['time'];                        //发布时间
      $content = nl2br(ubbcode($data['content']));  //发布内容
      if($data['revort'])
      {
         $retime = $data['retime'];                 //回复时间
         $revort = nl2br(ubbcode($data['revort'])); //回复内容
      }
?>

<!--留言内容，开始-->
<table border="0" cellpadding="0" cellspacing="0" width="730" class="TextBox_<?php echo $bg_style ?>">
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
   <div align="center">
   <strong><?php echo $name ?></strong> <br>
   <br>
   <img src="images/face/<?php echo $face ?>.gif" border=0 width=100 height=100>
   <br>
   <br>性别：<?php echo $gender ?><br>
   <br>
   </div>
   </td>
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
   <img src="images/revert.gif" border=0> <a href="revort.php?id=<?php echo $id ?>">回复</a>
   <img src="images/delete.gif" border=0> <a href="delete.php?id=<?php echo $id ?>"
      OnClick="JavaScript: if(confirm('确实要删除这条留言吗？')) return true; else return false;" >删除</a>
  <?php } ?>

   <hr align="left" width="70%" size="1" noshade>
   <!--start Text-->
   <table border="0" width="96%" cellspacing="4" cellpadding="4">
     <tr>
      <td class="booktext"><div class="booktext">
      <?php
         if($_SESSION['isAdmin'] || !$hide)
         {
            echo $content;
         }else{
            echo "<b>这是一条悄悄话，只有管理员能看</b>";
         }
      ?>
      </div></td>
     </tr>
   </table>
   <!--end Text--></td>
</tr>
<?php
   //如果有回复信息
   if($revort) {
?>
<tr>
<td valign="top" align="center">
<hr align="right" width="80%" size="1" noshade>
版主回复<br>
<?php echo $retime ?></td>
<td width="1" class="bgLine"></td>
<td valign="top">
<hr align="left" width="80%" size="1" noshade>
<!--回复内容-->
<table border="0" width="96%" cellspacing="4" cellpadding="4" class="booktext">
<tr>
  <td class="Revert"><?php echo $revort ?></td>
</tr>
</table>
</td>
</tr>

   <?php } ?>
      </table></td>
  </tr>
  <tr>
    <td height="8"></td>
  </tr>
</table>
<!--留言内容，结束-->

  <?php
      }//endforeach
     }else{//endif
  ?>
    <h3>暂时没有留言</h3>
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

<!--搜索和分页框-->
<table width=730 border=0 cellspacing=0 cellpadding=0 height=34>
  <tr>
<td nowrap width=100>

<table border=0 cellspacing=0 cellpadding=0>
   <form action="list.php" method=GET
   OnSubmit="return vaildForm(this)">
     <tr>
      <td nowrap>&nbsp;搜索：
        <input class=text size=13 name="keyword" value="<?php echo htmlspecialchars($keyword) ?>">
        &nbsp;</td>
     </tr>
   </form>
   <!--搜索框结束-->
      </table>
    </td>
    <td align=right nowrap>
<!-- 分页内容 -->
<p>共 <font color=red><b><?php echo $total ?></b></font> 条记录 &nbsp;<b>
<?php
  //为分页准备
  $last_offset = $offset - $each_page;
  if($last_offset<0)
  {
    ?>前一页<?
  }else{
   ?><a href="?offset=<?php echo $last_offset ?>&keyword=<?php echo $keyword ?>">前一页</a><?
  }

  echo " &nbsp; ";

  $next_offset = $offset + $each_page;
  if($next_offset>=$total)
  {
     ?>后一页<?
  }else{
     ?><a href="?offset=<?php echo $next_offset ?>&keyword=<?php echo $keyword ?>">后一页</a><?
  }
?>
   </td>
  </tr>
</table>
<?php
  include "footer.inc.php";
?>
