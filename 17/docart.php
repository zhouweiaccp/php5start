<?php
  /**************************************/
  /*    �ļ�����docart.php			    */
  /*    ˵�������¹��ﳵ�е�һ����Ʒ    */
  /**************************************/
  require_once 'config.inc.php';	//�����ļ�

  $session_id = session_id();					//�û���ݱ�ʶ��
  $product_id = intval($_GET['product_id']);	//��ƷID
  $number = intval($_GET['number']);			//��������
  $action = $_GET['action'];					//��Ϊ�����·�ʽ

  //��ø���Ʒ�ļ�¼
  $sql = "SELECT number FROM carts 
		WHERE session_id='$session_id' and product_id='$product_id'";
  $result = mysql_query($sql);
  $row = mysql_fetch_row($result);

  if($row)
  {
	$old_number = intval($row[0]);	//���ﳵ��ԭ����Ʒ������
	$have_product = true;			//���ﳵ�д��ڸ���Ʒ
  }else{
	$old_number = 0;
	$have_product = false;			//���ﳵ�в����ڸ���Ʒ
 }

 //��ӹ��ﳵ
 if($action == 'addcart') 
 {
	$new_number = $old_number + $number;

	if($new_number>0) 
	{
		if($have_product) 
		{
			//������ﳵ���Ѿ��и���Ʒ�������������µ�$new_number��
			$sql = "UPDATE carts SET number=$new_number
					WHERE session_id='$session_id' AND product_id='$product_id'";	
		}
		else
		{
			//������ﳵ�в����ڸ���Ʒ���������в���$new_number����Ʒ��¼
			$sql = "INSERT INTO carts (session_id, product_id, number)
					VALUES('$session_id', '$product_id', '$new_number')";
		}
	}
	else
	{
		//�������Ʒ����С�ڻ����0����ӹ��ﳵ��ɾ������Ʒ�ļ�¼
		$sql = "DELETE FROM carts
				WHERE session_id='$session_id' AND product_id='$product_id'";
	}
	$result = mysql_query($sql);
  }

  /* ���¹��ﳵ */
  elseif($action == 'editcart') {
	if($number>0)
	{
		//������µ���������0���������Ϊ$number��
		$sql = "UPDATE carts SET number=$number
				WHERE session_id='$session_id' AND product_id='$product_id'";	
	}
	else
	{
		//������µ�����������0����ӹ��ﳵ��ɾ������Ʒ
		$sql = "DELETE FROM carts
				WHERE session_id='$session_id' AND product_id='$product_id'";
	}
	$result = mysql_query($sql);
  }

  //��ת�����ﳵҳ��
  header("Location: mycart.php");
  exit;
?>
