<?php
  /************************************/
  /*      �ļ�����show.php            */
  /*      ˵������Ʒ��ϸ��Ϣҳ��      */
  /************************************/
  include "config.inc.php";		//�����ļ�
  include "header.inc.php";		//����ͷ�ļ�

  $product_id = intval($_REQUEST['product_id']); 	//��ƷID

  //ȡ����Ʒ����
  $result = mysql_query("SELECT p.*, c.* FROM products p
					JOIN categories c ON c.category_id = p.category_id
					WHERE p.product_id='$product_id'");
  $data = mysql_fetch_array($result);
?>

<form method="get" action="docart.php">
<h2>��Ʒ�鱨</h2>
  <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr>
      <th bgcolor="#e7f0ff" width="20%">��Ʒ����</th>
      <td bgcolor="#FFFFFF"><?php echo htmlspecialchars($data['category_name']) ?></td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">��Ʒ����</th>
      <td bgcolor="#FFFFFF"><b><?php echo htmlspecialchars($data['product_name']) ?></b>
    			<?php if($data['is_commend']) echo "<font color=red>�Ƽ�!</font>" ?></td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">��ƷͼƬ</th>
      <td bgcolor="#FFFFFF">
    	<?php if($data['photo']) { ?>
    		<img src="uploads/<?php echo $data['photo'] ?>" border="1" width="200"><br>
    	<?php } ?>
       </td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">����</th>
      <td bgcolor="#FFFFFF">
      	<font color=red><?php echo MoneyFormat($data['price']) ?></font> Ԫ
		<input type="hidden" name="action" value="addcart">
		<input type="hidden" name="product_id" value="<?php echo $product_id ?>">	
		<input name="number" value="1" type="text" size=4 maxlength="2">
		<input type="submit" value="���빺�ﳵ">&nbsp;<input type="image" src="img/buyit.gif" alt="����">
	  </td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">��ϸ����</th>
      <td bgcolor="#FFFFFF"><?php echo nl2br(htmlspecialchars($data['detail'])) ?></td>
    </tr>
  </table>
</form>
<?php
  include "footer.inc.php";		//����β��ҳ��
?>
