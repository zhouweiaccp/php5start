<?php
  /**************************************/
  /*		�ļ�����main_forum.php		*/
  /*		���ܣ���̳��ҳ��			*/
  /**************************************/

  require('config.inc.php');

  //ȡ�õ�ǰҳ��
  $page=$_GET['page'];

  //ÿҳ�����ʾ�ļ�¼��
  $each_page = EACH_PAGE;

  //����ҳ�濪ʼλ��
  if(!$page || $page == 1)
  {
	$start = 0;
  }else{
	$offset = $page - 1;
	$start = ($offset * $each_page);
  }
?>

<?php include('header.inc.php'); ?>

<h2>��̳</h2>
<p>

<?php
  //������¼�������ö���Ǻ�ʱ������
  $sql = "SELECT * FROM forum_topic 
	    ORDER BY sticky DESC, datetime DESC LIMIT $start, $each_page";
  $result = mysql_query($sql);
?>

<table width="100%" border="0" align="center" 
	cellpadding="3" cellspacing="1" bgcolor="#111">
<tr bgcolor="#E6E6E6">
<td width="60%" align="center"><strong>����</strong></td>
<td width="8%" align="center"><strong>������</strong></td>
<td width="8%" align="center"><strong>�ظ���</strong></td>
<td width="24%" align="center"><strong>����</strong></td>
</tr>

<?php
  //ѭ����������¼�б�
  while($rows=mysql_fetch_array($result))
  { 
?>
<tr bgcolor="#FFFFFF">
  <td>

<?php
	//����ǡ��ö����ļ�¼
	if ($rows['sticky'] == "1")
	{
	  ?><img src="sticky.gif" alt="�ö�" border="0"><?php 
	}
  
	//����ǡ��������ļ�¼
	if ($rows['locked'] == "1")
	{
	  ?><img src="lock.gif" alt="����" border="0"><?php
	}
?>
	<a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a>
  </td>
  <td align="center">
	  <?php 
		echo $rows['view'];  //�����
	  ?>
  </td>
  <td align="center">
	  <?php 
		echo $rows['reply'];  //�ظ���
	  ?>
  </td>
  <td align="center">
	  <?php 
		echo $rows['datetime'];  //����
	  ?>
  </td>
</tr>

<?php
  } //�˳�whileѭ��
?>
<tr>
  <td colspan="5" align="right" bgcolor="#E6E6E6">
	<input type="button" onClick="location.href='create_topic.php'" value="����������">
  </td>
</tr>
</table>

<?php
  //����ǰһҳ
  if($page > 1)
  {
	$prevpage = $page - 1;
  }

  //��ǰ��¼
  $currentend = $start + EACH_PAGE;

  //ȡ�����еļ�¼��
  $sql = "SELECT COUNT(*) FROM forum_topic";
  $result = mysql_query($sql);
  $row = mysql_fetch_row($result);
  $total = $row[0];

  //�����һҳ
  if($total>$currentend)
  {
	if(!$page){
		$nextpage = 2;
	}else{
		$nextpage = $page + 1;
	}
  }
?>

</p>

<p style="text-align: right;">

<?php

  //�жϷ�ҳ�����
  if ($prevpage || $nextpage) 
  {
	//ǰһҳ
	if($prevpage)
	{
		echo "<a href=\"?page={$prevpage}\"><< ǰһҳ</a> ";
	}else{
		echo "&nbsp";
	}

	//��һҳ
	if($nextpage)
	{
		echo "<a href=\"?page={$nextpage}\">��һҳ >></a> ";
	}else{
		echo "&nbsp";
	}
  }
?>

</p>

<h3>��־</h3>
<p>
<img src="sticky.gif" alt="Sticky" border="0" align="absmiddle"> �ö�������<br>
<img src="lock.gif" alt="Locked" border="0" align="absmiddle"> ����������<br>

<?php 
	//���������û�
	$sql = "SELECT COUNT(*) FROM forum_user";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$total_user = $row[0];
?>

����<b><?php echo $total_user ?></b>λע����û���</p>

<?php
  //����β��ҳ��
  include('footer.inc.php') 
?>
