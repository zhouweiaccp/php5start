<?php
  /**********************************/
  /*      �ļ�����mycart.php		*/
  /*      ˵�������ﳵ��ϸҳ��      */
  /**********************************/
  include "config.inc.php";		//�����ļ�
  include "header.inc.php";		//����ͷ�ļ�

  $session_id = session_id();  //�û���ݱ�ʶ
?>

<form action="upcart.php" method="post">
  <h2>���ﳵ</h2>
  <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr bgcolor="#e7f0ff">
      <th>ͼƬ</th>
      <th>��Ʒ����</th>
      <th>�۸�</th>
      <th>����</th>
      <th>С��</th>
      <th>����</th>
    </tr>
    <?php
	//ȡ�ù��ﳵ����ϸ��¼
	$sql = "SELECT s.*, s.number*p.price AS amount, 
			p.product_id, p.product_name, p.price, p.photo FROM products p
		  JOIN carts s ON s.product_id=p.product_id
		  WHERE session_id='$session_id'
		  ORDER BY p.product_name DESC";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	//�жϹ��ﳵ���Ƿ�����Ʒ
	if($numrows>0)
	{
		$total_price = 0; 
		//ѭ�����������ѡ����Ʒ�б�
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id']; 				//��ƷID
			$name = $data['product_name']; 			//��Ʒ����
			$price = $data['price']; 				//����
			$number = $data['number']; 				//����
			$amount = $data['amount']; 				//С��
			$photo = ($data['photo']) 
				? $data['photo'] : 'default.gif'; 	//ͼƬ

			$total_price +=$amount; 		 		//�ܼ۸�
  ?>
    <tr align="center">
      <td bgcolor="#FFFFFF">
		<img src="uploads/<?php echo $photo ?>" width=100 height=50 border="0">
      </td>
      <td bgcolor="#FFFFFF">
		<a href="show.php?product_id=<?php echo $id ?>">
				<b><?php echo htmlspecialchars($name) ?></b></a> 
      </td>
      <td bgcolor="#FFFFFF"><?php echo MoneyFormat($price) ?> Ԫ</td>
      <td bgcolor="#FFFFFF">
		<input type="text" name="p_<?php echo $id ?>" 
				value="<?php echo $number ?>" size=4 maxlength=3>
      </td>
      <td bgcolor="#FFFFFF"><?php echo MoneyFormat($amount) ?> Ԫ</td>
      <td bgcolor="#FFFFFF">
		<input name="delete" type="button" value="ȡ��" onclick="if(confirm('ȷʵҪȡ������Ʒ��?'))
		 location.href='docart.php?action=editcart&product_id=<?php echo $id ?>&number=0'">
      </td>
    </tr>
    <?php
		}
  ?>
    <!-- ��ʾ�ϼƽ�� -->
    <tr bgcolor="#e7f0ff">
      <td colspan="4" align="right"><strong>�ϼƽ��</strong></td>
      <td colspan="2"><strong><?php echo MoneyFormat($total_price) ?> Ԫ</strong></td>
    </tr>
    <?php
  	}else{
	  ?>
	    <tr>
	      <td align="center" colspan="6" bgcolor="#FFFFFF">���ﳵû���κ���Ʒ</td>
	    </tr>
    <?
	}
  ?>
  </table>
  <p align="center">
    <input type="submit" name="update_cart" value="���¹��ﳵ">
    &nbsp;
    <input type="button" name="check_out" value="ǰ������̨" onclick="location.href='checkout.php'">
  </p>
</form>

<?php
  include "footer.inc.php";		//����β��ҳ��
?>
