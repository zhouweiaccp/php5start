<?php
  /**********************************/
  /*      文件名：mycart.php		*/
  /*      说明：购物车详细页面      */
  /**********************************/
  include "config.inc.php";		//配置文件
  include "header.inc.php";		//公用头文件

  $session_id = session_id();  //用户身份标识
?>

<form action="upcart.php" method="post">
  <h2>购物车</h2>
  <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr bgcolor="#e7f0ff">
      <th>图片</th>
      <th>商品名称</th>
      <th>价格</th>
      <th>数量</th>
      <th>小计</th>
      <th>操作</th>
    </tr>
    <?php
	//取得购物车中详细记录
	$sql = "SELECT s.*, s.number*p.price AS amount, 
			p.product_id, p.product_name, p.price, p.photo FROM products p
		  JOIN carts s ON s.product_id=p.product_id
		  WHERE session_id='$session_id'
		  ORDER BY p.product_name DESC";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	//判断购物车中是否有商品
	if($numrows>0)
	{
		$total_price = 0; 
		//循环遍历，输出选购商品列表
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id']; 				//商品ID
			$name = $data['product_name']; 			//商品名称
			$price = $data['price']; 				//单价
			$number = $data['number']; 				//数量
			$amount = $data['amount']; 				//小计
			$photo = ($data['photo']) 
				? $data['photo'] : 'default.gif'; 	//图片

			$total_price +=$amount; 		 		//总价格
  ?>
    <tr align="center">
      <td bgcolor="#FFFFFF">
		<img src="uploads/<?php echo $photo ?>" width=100 height=50 border="0">
      </td>
      <td bgcolor="#FFFFFF">
		<a href="show.php?product_id=<?php echo $id ?>">
				<b><?php echo htmlspecialchars($name) ?></b></a> 
      </td>
      <td bgcolor="#FFFFFF"><?php echo MoneyFormat($price) ?> 元</td>
      <td bgcolor="#FFFFFF">
		<input type="text" name="p_<?php echo $id ?>" 
				value="<?php echo $number ?>" size=4 maxlength=3>
      </td>
      <td bgcolor="#FFFFFF"><?php echo MoneyFormat($amount) ?> 元</td>
      <td bgcolor="#FFFFFF">
		<input name="delete" type="button" value="取消" onclick="if(confirm('确实要取消该商品吗?'))
		 location.href='docart.php?action=editcart&product_id=<?php echo $id ?>&number=0'">
      </td>
    </tr>
    <?php
		}
  ?>
    <!-- 显示合计金额 -->
    <tr bgcolor="#e7f0ff">
      <td colspan="4" align="right"><strong>合计金额</strong></td>
      <td colspan="2"><strong><?php echo MoneyFormat($total_price) ?> 元</strong></td>
    </tr>
    <?php
  	}else{
	  ?>
	    <tr>
	      <td align="center" colspan="6" bgcolor="#FFFFFF">购物车没有任何商品</td>
	    </tr>
    <?
	}
  ?>
  </table>
  <p align="center">
    <input type="submit" name="update_cart" value="更新购物车">
    &nbsp;
    <input type="button" name="check_out" value="前往结账台" onclick="location.href='checkout.php'">
  </p>
</form>

<?php
  include "footer.inc.php";		//公用尾部页面
?>
