<?php
  /*******************************/
  /*      �ļ�����index.php      */
  /*      ˵�����̳���ҳ         */
  /*******************************/
  include "config.inc.php";		//�����ļ�
  include "header.inc.php";		//����ͷ�ļ�
?>

<h2>��ҳ�Ƽ�</h2>
<?php
  //ȡ����ҳ�Ƽ���Ʒ
  $sql = "SELECT product_name, product_id, price, photo FROM products
  	    ORDER BY is_commend DESC, post_datetime DESC LIMIT 5";
  $result = mysql_query($sql);
?>
<!-- ��ҳ�Ƽ���ʼ -->
<table border="0" width="100%" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
  <?php
  	//ѭ������Ƽ���Ʒ
  	while($data = mysql_fetch_array($result))
  	{
  		$product_id = $data['product_id'];							//��ƷID
  		$product_name = htmlspecialchars($data['product_name']); 	//��Ʒ����
  		$photo = ($data['photo']) ? $data['photo']:'default.gif';	//ͼƬ
  		$price = MoneyFormat($data['price']);						//�۸�
  ?>
  <td align="center"><a href="show.php?product_id=<?php echo $product_id ?>" ?>
  	<img border=0 src="uploads/<?php echo $photo ?>" height=85 width=85>
  	<br><?php echo $product_name ?>
  	</a><br><font color="red">��<?php echo $price ?></font>
  </td>
  <?php } ?>
  </tr>
</table>
<!-- ��ҳ�Ƽ����� -->

<h2>��Ʒ�б�</h2>
<?php
  //ȡ����Ʒ��Ŀ¼
  $sql = "SELECT * FROM categories ORDER BY category_name";
  $result = mysql_query($sql);

  //ѭ�������ƷĿ¼
  while($row = mysql_fetch_array($result))
  {
?>
  <table border="0" width="100%" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr bgcolor="#e7f0ff">
  	<th colspan="3" align="left">[*]
  	<?php
  	//����������ӵ���Ʒ��������
  	echo "<a href=\"list.php?catid=$row[category_id]\">";
  	echo htmlspecialchars($row['category_name']);
  	echo "</a>";
  	?></th>
    </tr>
<?php
  	//ȡ�÷����µ���Ʒ��Ϣ
  	$sql2 = "SELECT product_name, product_id, price, is_commend FROM products
  		   WHERE category_id = '$row[category_id]'
  		   ORDER BY is_commend DESC, post_datetime DESC LIMIT 5";
  	$result2 = mysql_query($sql2);

  	//ѭ�������Ʒ��Ϣ
  	while($row2 = mysql_fetch_array($result2))
  	{
?>
   <tr bgcolor="#FFFFFF">
  	<td width="5%"><?php echo $row2['product_id'] ?></td>
  	<td width="70%">
  	<?php if($row2['is_commend']){?>
  		<img src="img/star.gif" border=0 align="absmiddle">
  	<?php } ?>
	<a href="show.php?product_id=<?php echo $row2['product_id'] ?>">
		<?php echo htmlspecialchars($row2['product_name']) ?></a>
  	<a href="docart.php?product_id=<?php echo $row2['product_id'] ?>&action=addcart&number=1">
  		<img src="img/add.gif" border=0 align="absmiddle" height=15></a>
	</td>
	<td width="25%" align="right"><?php echo MoneyFormat($row2['price']) ?> Ԫ</td>
  </tr>
<?php
  	}//������Ʒ��Ϣ��ѭ��
  	$row2 = null;
?>
  	</table>
  	<br>
<?php
  }//������ƷĿ¼ѭ��
  include "footer.inc.php";		//����β��ҳ��
?>
