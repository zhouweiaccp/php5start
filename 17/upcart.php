<?php
  /**************************************/
  /*    文件名：upcart.php              */
  /*    说明：更新购物车中的全部商品    */
  /**************************************/
  require_once 'config.inc.php';	//配置文件

  $session_id = session_id();		//用户身份标识别

  //更新全部记录
  if($_POST['update_cart'])
  {
	//循环更新购物车中的每一个记录
	foreach($_POST as $key=>$number)
	{
	  //将商品ID从$key中分离出来
	  list($null, $product_id) = split("_",$key);

	  //更新购物车
	  //如果$number大于0，则更新商品数量
	  //反之，则从购物车中删除该商品的记录
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

  //清空购物车
  elseif($_POST['clear_cart'])
  {
	//从购物车中删除所有的商品记录
	$sql = "DELETE FROM carts WHERE session_id='$session_id'";
	$result = mysql_query($sql);
  }

  //跳转到购物车页面
  header("Location: mycart.php");
?>
