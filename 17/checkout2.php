<?php
  /*******************************/
  /*    �ļ�����checkout2.php    */
  /*    ˵�������ɶ���ҳ��       */
  /*******************************/
  include "config.inc.php";		//�����ļ�
  include "header.inc.php";		//����ͷ�ļ�

  $session_id = session_id();				//�û���ݱ�ʶ

  $order_id	= time();						//������
  $user_name	= $_POST['user_name'];		//�û���
  $email		= $_POST['email'];			//�����ʼ�	
  $postcode	= $_POST['postcode'];			//�ʱ�
  $tel_no		= $_POST['tel_no'];			//�绰����
  $content 	= $_POST['content'];			//��ע
  $address	= $_POST['address1'] . $_POST['address2']; 	//��ַ
?>

<h2>������Ϣ</h2>
<h3>�����ţ�<font color=red>M<?php echo $order_id ?></font></h3>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
    <th>��Ʒ����</th>
    <th>�۸�</th>
    <th>����</th>
    <th>С��</th>
  </tr>
  <?php
	//ȡ�ù��ﳵ��Ʒ��¼
	$sql = "SELECT s.*, s.number*p.price AS amount, 
				p.product_id, p.product_name, p.price, p.photo FROM products p
			JOIN carts s ON s.product_id=p.product_id
			WHERE session_id='$session_id'
			ORDER BY p.product_name DESC";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	//�ж���Ʒ�Ƿ����
	if($numrows>0)
	{
		$total_price = 0;
	
		//ѭ��������������
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id'];				//��ƷID
			$name = $data['product_name'];			//��Ʒ����
			$price = $data['price'];				//����
			$number = $data['number'];				//����
			$amount = $data['amount'];				//С��
			$photo = ($data['photo']) 
				? $data['photo'] : 'default.gif';	//ͼƬ
			$total_price +=$amount;					//�ܼ۸�
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td><a href="show.php?product_id=<?php echo $id ?>"> 
		<b><?php echo htmlspecialchars($name) ?></b></a></td>
    <td><?php echo MoneyFormat($price) ?> Ԫ</td>
    <td><?php echo $number ?></td>
    <td><?php echo MoneyFormat($amount) ?> Ԫ</td>
  </tr>
  <?php
		}//endwhile
  ?>
  <tr bgcolor="#e7f0ff">
    <td colspan="3" align="right"><strong>�ϼƽ��</strong></td>
    <td><strong><?php echo MoneyFormat($total_price) ?> Ԫ</strong></td>
  </tr>
  <?php
  	}else{
	  ?>
		<tr>
		  <td align="center" colspan="4" bgcolor="#FFFFFF">���ﳵû���κ���Ʒ</td>
		</tr>
	  <?
	}
  ?>
</table>
<?php
  //����Ч�����������ݿ�
  if($total_price)
  {
	$sql = "INSERT INTO orders 
			(order_id, session_id, total_price, user_name, email, address, postcode, tel_no, content)
		  VALUES ('$order_id', '$session_id', '$total_price', '$user_name', 
			'$email', '$address' , '$postcode', '$tel_no', '$content');";
	
	mysql_query($sql);
  }

  //��������session_id;
  session_regenerate_id();
  session_write_close();
  $new_sessionid = session_id();

  include "footer.inc.php";		//����β��ҳ��
?>
