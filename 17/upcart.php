<?php
  /**************************************/
  /*    �ļ�����upcart.php              */
  /*    ˵�������¹��ﳵ�е�ȫ����Ʒ    */
  /**************************************/
  require_once 'config.inc.php';	//�����ļ�

  $session_id = session_id();		//�û���ݱ�ʶ��

  //����ȫ����¼
  if($_POST['update_cart'])
  {
	//ѭ�����¹��ﳵ�е�ÿһ����¼
	foreach($_POST as $key=>$number)
	{
	  //����ƷID��$key�з������
	  list($null, $product_id) = split("_",$key);

	  //���¹��ﳵ
	  //���$number����0���������Ʒ����
	  //��֮����ӹ��ﳵ��ɾ������Ʒ�ļ�¼
	  if($number>0)
	  {
		$sql = "UPDATE carts SET number=$number
				WHERE session_id='$session_id' AND product_id='$product_id'";
	  }
	  else
	  {
		$sql = "DELETE FROM carts
				WHERE session_id='$session_id' AND product_id='$product_id'";
	  }
	  $result = mysql_query($sql);
	}
  }

  //��չ��ﳵ
  elseif($_POST['clear_cart'])
  {
	//�ӹ��ﳵ��ɾ�����е���Ʒ��¼
	$sql = "DELETE FROM carts WHERE session_id='$session_id'";
	$result = mysql_query($sql);
  }

  //��ת�����ﳵҳ��
  header("Location: mycart.php");
?>
