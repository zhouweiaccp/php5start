<?php
  /************************/
  /*   �ļ�����list.php   */
  /*   ˵���������б�     */
  /************************/

   include "config.inc.php";
   include"ubbcode.inc.php";
   include"header.inc.php";

   $each_page = EACH_PAGE;              //ÿҳ�����ʾ������
   $offset = intval($_GET['offset']);   //��¼ƫ����
   $keyword = $_GET['keyword'];         //�ؼ��֣�������������

   //�����������
   if($keyword)
   {
      $where = "content LIKE '%$keyword%' OR revort LIKE '%$keyword%' ";
      $title = "�������";
   }
   else
   {
      $where = "1=1";
      $title = "��������";
   }

   //�ܼ�¼��
   $sql = "SELECT Count(*) FROM guestbook WHERE $where";
   $result = mysql_query($sql);
   $row = mysql_fetch_row($result);
   $total = $row[0];

   //�淶$offset
   if($offset<0)
      $offset = 0;
   elseif($offset > $total)
      $offset = $total;

   $result = mysql_query($sql);

   //��ѯ��ǰҳ��¼
   $sql = "SELECT * FROM guestbook WHERE $where ORDER BY id DESC
         LIMIT $offset, $each_page";

   $result = mysql_query($sql);

   //��ѯ�ļ�¼��
   $numrows = mysql_num_rows($result);

?>
<script>
function vaildForm(obj)
{
	if(obj.keyword.value=='' || obj.keyword.value.length<3)
	{
		alert('��û����д�����ؼ��ʣ��������Ĺؼ���̫�̣�\n��������д���� 3 ���ַ���');
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<!--����-->
<table border=0 cellpadding=0 cellspacing=0 width=730 class=TitleBar>
  <tr>
    <td class=TitleBar_L></td>
    <td class=TitleBar_T> �� <?php echo $title ?> �� </td>
    <td class=TitleBar_R></td>
  </tr>
</table>
<?php

   if($numrows>0)
   {
   $tmp = 0;

   /* ѭ���������飬����б� */
   while($data = mysql_fetch_array($result))
   {
      $tmp ++;
      $bg_style = ($tmp%2)+1;                       //��񱳾���ʽ
      $id = $data['id'];                            //����ID
      $hide = $data['hide'];                        //��ֻ�й���Ա�Ķ�
      $name = $data['name'];                        //�û���
      $gender = ($data['gender']) ? '��' : 'Ů';     //�Ա�
      $email = $data['email'];                      //�����ʼ���ַ
      $homepage = $data['homepage'];                //��ҳ
      $face = $data['face'];                        //ͷ��
      $oicq = $data['oicq'];                        //OICQ����
      $ip = $data['ip'];                            //IP��ַ
      $time = $data['time'];                        //����ʱ��
      $content = nl2br(ubbcode($data['content']));  //��������
      if($data['revort'])
      {
         $retime = $data['retime'];                 //�ظ�ʱ��
         $revort = nl2br(ubbcode($data['revort'])); //�ظ�����
      }
?>

<!--�������ݣ���ʼ-->
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
   <br>�Ա�<?php echo $gender ?><br>
   <br>
   </div>
   </td>
   <td width="1" class="bgLine"></td>
   <td valign="top" width="575">&nbsp;
     <img alt="5345@et.com" border=0 src="images/email.gif" width=16 height=16>
     <a href="mailto:<?php echo $email ?>">����</a>
     <img alt="<?php echo $email ?>" src="images/home.gif" border=0 width=16 height=16>
     <a href="<?php echo $homepage ?>" target=_blank>��ҳ</a>
     <img alt="IP ��ַ��<?php echo $ip ?>" border=0 src="images/ip.gif" width=16 height=15> ��ַ
     <img alt="<?php echo $time ?>" border=0 src="images/time.gif" width=16 height=16> ����ʱ�䣺
     <?php echo $time ?>

  <?php if($_SESSION['isAdmin']) { ?>
   <img src="images/revert.gif" border=0> <a href="revort.php?id=<?php echo $id ?>">�ظ�</a>
   <img src="images/delete.gif" border=0> <a href="delete.php?id=<?php echo $id ?>"
      OnClick="JavaScript: if(confirm('ȷʵҪɾ������������')) return true; else return false;" >ɾ��</a>
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
            echo "<b>����һ�����Ļ���ֻ�й���Ա�ܿ�</b>";
         }
      ?>
      </div></td>
     </tr>
   </table>
   <!--end Text--></td>
</tr>
<?php
   //����лظ���Ϣ
   if($revort) {
?>
<tr>
<td valign="top" align="center">
<hr align="right" width="80%" size="1" noshade>
�����ظ�<br>
<?php echo $retime ?></td>
<td width="1" class="bgLine"></td>
<td valign="top">
<hr align="left" width="80%" size="1" noshade>
<!--�ظ�����-->
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
<!--�������ݣ�����-->

  <?php
      }//endforeach
     }else{//endif
  ?>
    <h3>��ʱû������</h3>
  <?php
   }
  ?>

<!--�ױ�-->
<table border="0" cellpadding="0" cellspacing="0" width="730" class="Hemline">
<tr>
  <td class="Hemline_L"></td>
  <td class="Hemline_T"><img style="width: 1; height: 0"></td>
  <td class="Hemline_R"></td>
</tr>
</table>

<!--�����ͷ�ҳ��-->
<table width=730 border=0 cellspacing=0 cellpadding=0 height=34>
  <tr>
<td nowrap width=100>

<table border=0 cellspacing=0 cellpadding=0>
   <form action="list.php" method=GET
   OnSubmit="return vaildForm(this)">
     <tr>
      <td nowrap>&nbsp;������
        <input class=text size=13 name="keyword" value="<?php echo htmlspecialchars($keyword) ?>">
        &nbsp;</td>
     </tr>
   </form>
   <!--���������-->
      </table>
    </td>
    <td align=right nowrap>
<!-- ��ҳ���� -->
<p>�� <font color=red><b><?php echo $total ?></b></font> ����¼ &nbsp;<b>
<?php
  //Ϊ��ҳ׼��
  $last_offset = $offset - $each_page;
  if($last_offset<0)
  {
    ?>ǰһҳ<?
  }else{
   ?><a href="?offset=<?php echo $last_offset ?>&keyword=<?php echo $keyword ?>">ǰһҳ</a><?
  }

  echo " &nbsp; ";

  $next_offset = $offset + $each_page;
  if($next_offset>=$total)
  {
     ?>��һҳ<?
  }else{
     ?><a href="?offset=<?php echo $next_offset ?>&keyword=<?php echo $keyword ?>">��һҳ</a><?
  }
?>
   </td>
  </tr>
</table>
<?php
  include "footer.inc.php";
?>
