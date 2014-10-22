<?php
  /**************************************/
  /*    文件名：admin/order_show.php    */
  /*    说明：定单列表页面              */
  /**************************************/
  include "../config.inc.php";	//配置文件
  include "header.inc.php";	//管理界面公用头文件

  $order_id = intval($_GET['order_id']);

  //取得session_id
  $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
  $result = mysql_query($sql);
  $order = mysql_fetch_array($result);
  $session_id	= $order['session_id'];

	//取得购物车信息
	$sql = "SELECT s.*, s.number*p.price AS amount, 
				p.product_id, p.product_name, p.price, p.photo FROM products p
		  JOIN carts s ON s.product_id=p.product_id
		  WHERE session_id='$session_id'
		  ORDER BY p.product_name DESC";
	$result = mysql_query($sql);

	//购物记录数量
	$numrows = mysql_num_rows($result);
?>

<table width="100%" class="main" cellspacing="1">
  <caption>
  订单详情
  </caption>
  <tr>
    <th>商品名称</th>
    <th>价格</th>
    <th>数量</th>
    <th>小计</th>
  </tr>
  <?php
	if($numrows>0)
	{
		$total_price = 0;
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id'];			//商品ID
			$name = $data['product_name'];	//商品名称
			$price = $data['price'];			//单价
			$number = $data['number'];		//数量
			$amount = $data['amount'];		//小计
			$photo = ($data['photo']) ? $data['photo'] : 'default.gif';

			$total_price +=$amount;
  ?>
  <tr align="center">
    <td><a href="../show.php?product_id=<?php echo $id ?>" target="_blank"> <b><?php echo htmlspecialchars($name) ?></b></a></td>
    <td><?php echo MoneyFormat($price) ?> 元</td>
    <td><?php echo $number ?></td>
    <td><?php echo MoneyFormat($amount) ?> 元</td>
  </tr>
  <?php
		}//endwhile
  ?>
  <tr>
    <td colspan="3" align="right"><strong>合计金额</strong></td>
    <td><strong><?php echo MoneyFormat($total_price) ?> 元</strong></td>
  </tr>
  <?php
  	}else{
	  ?>
  		<tr>
			<td align="center" colspan="4">没有任何商品</td>
		</tr>
  	  <?
	}
  ?>
</table>
<p><hr></p>
<table border="0" class="main" cellspacing="1" width="60%">
  <caption>
  客户信息
  </caption>
  <tr>
    <th align="right">用户姓名</th>
    <td><?php echo htmlspecialchars($order["user_name"]) ?></td>
  </tr>
  <tr>
    <th align="right">电子邮件</th>
    <td><?php echo htmlspecialchars($order["email"]) ?></td>
  </tr>
  <tr>
    <th align="right">收货详细地址</th>
    <td><?php echo htmlspecialchars($order["address"]) ?></td>
  </tr>
  <tr>
    <th align="right">邮政编码</th>
    <td><?php echo htmlspecialchars($order["postcode"]) ?></td>
  </tr>
  <tr>
    <th align="right">联系电话</th>
    <td><?php echo htmlspecialchars($order["tel_no"]) ?></td>
  </tr>
  <tr>
    <th align="right">备注</th>
    <td><?php echo nl2br(htmlspecialchars($order["content"])) ?></td>
  </tr>
</table>
<p>
</body>
</html>
