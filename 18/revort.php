<?php
   /****************************/
   /*   �ļ�����revort.php     */
   /*   ˵��������Ա�ظ�ҳ��   */
   /****************************/

   include "config.inc.php";
   include "ubbcode.inc.php";
   include"header.inc.php";

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
		alert('��û����д�����ؼ��ʣ��������Ĺؼ���̫�̣�\n��������д���� 3 ���ַ���');
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
    <td class=TitleBar_T> �� �ظ����� �� </td>
    <td class=TitleBar_R></td>
  </tr>
</table>
<?

   if($numrows>0)
   {
      //��ȡ���Լ�¼
	 $data = mysql_fetch_array($result);

      $id = $data['id'];                           //����ID
      $hide = $data['hide'];                       //��ֻ�й���Ա�Ķ�
      $name = $data['name'];                       //�û���
      $gender = ($data['gender']) ? '��' : 'Ů';    //�Ա�
      $email = $data['email'];                      //�����ʼ���ַ
      $homepage = $data['homepage'];                //��ҳ
      $face = $data['face'];                        //ͷ��
      $oicq = $data['oicq'];                        //OICQ����
      $ip = $data['ip'];                            //IP��ַ
      $time = $data['time'];                        //����ʱ��
      $content = nl2br(ubbcode($data['content']));	//��������
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
          �Ա�<?php echo $gender ?><br>
          <br>
        </div></td>
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
     <img src="images/delete.gif" border=0> <a href="delete.php?id=<?php echo $id ?>"
       OnClick="JavaScript: if(confirm('ȷʵҪɾ������������')) return true; else return false;" >ɾ��</a>
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
	�����ظ�
  <br>
	<?php echo $retime ?>
  </td>
<td width="1" class="bgLine"></td>

<form action="revort_post.php" method="post">
<td valign="top">
  <hr align="left" width="80%" size="1" noshade>
  <textarea name="revort" rows=10 
    style="width: 400; height:200"><?php echo htmlspecialchars($revort) ?></textarea>
  <input type="submit" value="�����ظ�" />
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
    <h3>���Բ����ڣ������Ѿ���ɾ����</h3>
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

<!-- �����ͷ�ҳ�� -->
<table width=730 border=0 cellspacing=0 cellpadding=0 height=34>
  <tr>
    <td nowrap width=100><table border=0 cellspacing=0 cellpadding=0>
   <!-- ������ -->
      <form action="list.php" method=GET OnSubmit="return vaildForm(this)">
     <tr>
      <td nowrap>&nbsp;������
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
