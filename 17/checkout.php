<?php
  /*************************************/
  /*    �ļ�����checkout.php           */
  /*    ˵�����˿���Ϣ�ǼǱ�ҳ��     */
  /*************************************/
  include "config.inc.php";		//�����ļ�
  include "header.inc.php";		//����ͷ�ļ�

  $session_id = session_id();	//�û���ݱ�ʶ

  //ȡ�ù��ﳵ��Ϣ
  $sql = "SELECT s.*, s.number*p.price AS amount, 
		p.product_id, p.product_name, p.price, p.photo FROM products p
		JOIN carts s ON s.product_id=p.product_id
		WHERE session_id='$session_id'
		ORDER BY p.product_name DESC";
  $result = mysql_query($sql);

  //�����¼����
  $numrows = mysql_num_rows($result);

  //���û�м�¼�����ع��ﳵҳ��
  if(!$numrows)
  {
	header("Location: mycart.php");
	exit;
  }
?>
<script language="JavaScript" type="text/javascript">
<!--
  function checkit ( form )
  {
	if (form.user_name.value =='') {	alert('�û�����������д��'); return false;}
	else if (form.email.value =='') { alert('�����ʼ���ַ������д��');	 return false;}
	else if (form.address1.value =='') { alert('�ջ���ϸ��ַ������д��'); return false;}
	else if (form.tel_no.value =='') {alert('��ϵ�绰������д'); return false;}
	return true;
  }
//-->
</script>

<form name="" action="checkout2.php" method="POST" onsubmit="return checkit(this)">
  <h2>������Ϣ</h2>
  <table border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr>
      <th align="right" bgcolor="#e7f0ff">�û�����</th>
      <td bgcolor="#FFFFFF">
		<input name="user_name" type="text" id="user_name" size="40" maxlength="20">
	 </td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">�����ʼ�</th>
      <td bgcolor="#FFFFFF"><input name="email" type="text" size="40" maxlength="40"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">�ջ���ϸ��ַ</th>
      <td bgcolor="#FFFFFF"><input type="text" name="address1" size="40"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">��ַ2</th>
      <td bgcolor="#FFFFFF"><input type="text" name="address2" size="40"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">��������</th>
      <td bgcolor="#FFFFFF"><input name="postcode" type="text" id="postcode" maxlength="6"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">��ϵ�绰</th>
      <td bgcolor="#FFFFFF"><input name="tel_no" type="text" id="tel_no" maxlength="20"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">��ע</th>
      <td bgcolor="#FFFFFF"><textarea name="content" cols="40" rows="5"></textarea></td>
    </tr>
  </table>
  <p>�û���Ϣ������д����������޷��յ���������Ʒ��</p>
  <p>
    <input type="submit" value=" ���ɶ��� ">
  </p>
</form>
<h2>���ﳵ</h2>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
    <th>��Ʒ����</th>
    <th>�۸�</th>
    <th>����</th>
    <th>С��</th>
  </tr>
  <?php
	if($numrows>0) {
		$total_price = 0;
	
		//ѭ��������������
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id'];					//��ƷID
			$name = $data['product_name'];				//��Ʒ����
			$price = $data['price'];					//����
			$number = $data['number'];					//����
			$amount = $data['amount'];					//С��
			$photo = ($data['photo']) 
					? $data['photo'] : 'default.gif';	//ͼƬ
			$total_price +=$amount;						//�ܼ۸�
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td><a href="show.php?product_id=<?php echo $id ?>">
			 <b><?php echo htmlspecialchars($name) ?></b></a>
    </td>
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
  include "footer.inc.php";		//����β��ҳ��
?>
