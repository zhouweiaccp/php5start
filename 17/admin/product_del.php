<?php
  /***************************************/
  /*    �ļ�����admin/product_del.php    */
  /*    ˵����ɾ����Ʒҳ��               */
  /***************************************/
  include "../config.inc.php";		//�����ļ�
  include "header.inc.php";			//������湫��ͷ�ļ�

  $product_id = $_GET['product_id'];	//��ƷID

  //��ȡͼ��
  $sql = "SELECT photo FROM products WHERE product_id='$product_id'";
  $result = mysql_query($sql);
  $row  = mysql_fetch_row($result);	
  $photo = $row[0];

  //ɾ����¼
  $sql = "DELETE FROM products WHERE product_id='$product_id'";
  $result = mysql_query($sql);

  if(mysql_affected_rows($db)>0)
  {
	//ɾ��ͼƬ
	@unlink(UPLOAD_PATH.$photo);
	$error_msg = "��Ʒ����ɾ���ɹ���";
  }else{
	$error_msg = "��Ʒ����ɾ��ʧ�ܡ�";
  }

  ExitMessage($error_msg);
?>
