<?php
  /**************************************/
  /*    �ļ�����admin/order_show.php    */
  /*    ˵���������б�ҳ��              */
  /**************************************/
  include "../config.inc.php";	//�����ļ�
  include "header.inc.php";	//������湫��ͷ�ļ�

  $order_id = intval($_GET['order_id']);

  //ȡ��session_id
  $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
  $result = mysql_query($sql);
  $order = mysql_fetch_array($result);
  $session_id	= $order['session_id'];

	//ȡ�ù��ﳵ��Ϣ
	$sql = "SELECT s.*, s.number*p.price AS amount, 
				p.product_id, p.product_name, p.price, p.photo FROM products p
		  JOIN carts s ON s.product_id=p.product_id
		  WHERE session_id='$session_id'
		  ORDER BY p.product_name DESC";
	$result = mysql_query($sql);

	//�����¼����
	$numrows = mysql_num_rows($result);
?>

<table width="100%" class="main" cellspacing="1">
  <caption>
  ��������
  </caption>
  <tr>
    <th>��Ʒ����</th>
    <th>�۸�</th>
    <th>����</th>
    <th>С��</th>
  </tr>
  <?php
	if($numrows>0)
	{
		$total_price = 0;
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id'];			//��ƷID
			$name = $data['product_name'];	//��Ʒ����
			$price = $data['price'];			//����
			$number = $data['number'];		//����
			$amount = $data['amount'];		//С��
			$photo = ($data['photo']) ? $data['photo'] : 'default.gif';

			$total_price +=$amount;
  ?>
  <tr align="center">
    <td><a href="../show.php?product_id=<?php echo $id ?>" target="_blank"> <b><?php echo htmlspecialchars($name) ?></b></a></td>
    <td><?php echo MoneyFormat($price) ?> Ԫ</td>
    <td><?php echo $number ?></td>
    <td><?php echo MoneyFormat($amount) ?> Ԫ</td>
  </tr>
  <?php
		}//endwhile
  ?>
  <tr>
    <td colspan="3" align="right"><strong>�ϼƽ��</strong></td>
    <td><strong><?php echo MoneyFormat($total_price) ?> Ԫ</strong></td>
  </tr>
  <?php
  	}else{
	  ?>
  		<tr>
			<td align="center" colspan="4">û���κ���Ʒ</td>
		</tr>
  	  <?
	}
  ?>
</table>
<p><hr></p>
<table border="0" class="main" cellspacing="1" width="60%">
  <caption>
  �ͻ���Ϣ
  </caption>
  <tr>
    <th align="right">�û�����</th>
    <td><?php echo htmlspecialchars($order["user_name"]) ?></td>
  </tr>
  <tr>
    <th align="right">�����ʼ�</th>
    <td><?php echo htmlspecialchars($order["email"]) ?></td>
  </tr>
  <tr>
    <th align="right">�ջ���ϸ��ַ</th>
    <td><?php echo htmlspecialchars($order["address"]) ?></td>
  </tr>
  <tr>
    <th align="right">��������</th>
    <td><?php echo htmlspecialchars($order["postcode"]) ?></td>
  </tr>
  <tr>
    <th align="right">��ϵ�绰</th>
    <td><?php echo htmlspecialchars($order["tel_no"]) ?></td>
  </tr>
  <tr>
    <th align="right">��ע</th>
    <td><?php echo nl2br(htmlspecialchars($order["content"])) ?></td>
  </tr>
</table>
<p>
</body>
</html>
