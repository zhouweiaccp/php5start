<?php
  /***************************************/
  /*    文件名：admin/product_del.php    */
  /*    说明：删除商品页面               */
  /***************************************/
  include "../config.inc.php";		//配置文件
  include "header.inc.php";			//管理界面公用头文件

  $product_id = $_GET['product_id'];	//商品ID

  //获取图像
  $sql = "SELECT photo FROM products WHERE product_id='$product_id'";
  $result = mysql_query($sql);
  $row  = mysql_fetch_row($result);	
  $photo = $row[0];

  //删除记录
  $sql = "DELETE FROM products WHERE product_id='$product_id'";
  $result = mysql_query($sql);

  if(mysql_affected_rows($db)>0)
  {
	//删除图片
	@unlink(UPLOAD_PATH.$photo);
	$error_msg = "商品内容删除成功。";
  }else{
	$error_msg = "商品内容删除失败。";
  }

  ExitMessage($error_msg);
?>
