<?php
  /**************************************/
  /*    文件名：docart.php			    */
  /*    说明：更新购物车中的一种商品    */
  /**************************************/
  require_once 'config.inc.php';	//配置文件

  $session_id = session_id();					//用户身份标识别
  $product_id = intval($_GET['product_id']);	//产品ID
  $number = intval($_GET['number']);			//购买数量
  $action = $_GET['action'];					//行为，更新方式

  //获得该商品的记录
  $sql = "SELECT number FROM carts 
		WHERE session_id='$session_id' and product_id='$product_id'";
  $result = mysql_query($sql);
  $row = mysql_fetch_row($result);

  if($row)
  {
	$old_number = intval($row[0]);	//购物车中原有商品的数量
	$have_product = true;			//购物车中存在该商品
  }else{
	$old_number = 0;
	$have_product = false;			//购物车中不存在该商品
 }

 //添加购物车
 if($action == 'addcart') 
 {
	$new_number = $old_number + $number;

	if($new_number>0) 
	{
		if($have_product) 
		{
			//如果购物车中已经有该商品，则将其数量更新到$new_number件
			$sql = "UPDATE carts SET number=$new_number
					WHERE session_id='$session_id' AND product_id='$product_id'";	
		}
		else
		{
			//如果购物车中不存在该商品，则向其中插入$new_number件商品记录
			$sql = "INSERT INTO carts (session_id, product_id, number)
					VALUES('$session_id', '$product_id', '$new_number')";
		}
	}
	else
	{
		//如果该商品数量小于或等于0，则从购物车中删除该商品的记录
		$sql = "DELETE FROM carts
				WHERE session_id='$session_id' AND product_id='$product_id'";
	}
	$result = mysql_query($sql);
  }

  /* 更新购物车 */
  elseif($action == 'editcart') {
	if($number>0)
	{
		//如果更新的数量大于0，则将其更新为$number件
		$sql = "UPDATE carts SET number=$number
				WHERE session_id='$session_id' AND product_id='$product_id'";	
	}
	else
	{
		//如果更新的数量不大于0，则从购物车中删除该商品
		$sql = "DELETE FROM carts
				WHERE session_id='$session_id' AND product_id='$product_id'";
	}
	$result = mysql_query($sql);
  }

  //跳转到购物车页面
  header("Location: mycart.php");
  exit;
?>
