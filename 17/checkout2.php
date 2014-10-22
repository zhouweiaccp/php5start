<?php
  /*******************************/
  /*    文件名：checkout2.php    */
  /*    说明：生成定单页面       */
  /*******************************/
  include "config.inc.php";		//配置文件
  include "header.inc.php";		//公用头文件

  $session_id = session_id();				//用户身份标识

  $order_id	= time();						//订单号
  $user_name	= $_POST['user_name'];		//用户名
  $email		= $_POST['email'];			//电子邮件	
  $postcode	= $_POST['postcode'];			//邮编
  $tel_no		= $_POST['tel_no'];			//电话号码
  $content 	= $_POST['content'];			//备注
  $address	= $_POST['address1'] . $_POST['address2']; 	//地址
?>

<h2>订单信息</h2>
<h3>订单号：<font color=red>M<?php echo $order_id ?></font></h3>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
    <th>商品名称</th>
    <th>价格</th>
    <th>数量</th>
    <th>小计</th>
  </tr>
  <?php
	//取得购物车商品记录
	$sql = "SELECT s.*, s.number*p.price AS amount, 
				p.product_id, p.product_name, p.price, p.photo FROM products p
			JOIN carts s ON s.product_id=p.product_id
			WHERE session_id='$session_id'
			ORDER BY p.product_name DESC";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	//判断商品是否存在
	if($numrows>0)
	{
		$total_price = 0;
	
		//循环遍历，输出结果
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id'];				//商品ID
			$name = $data['product_name'];			//商品名称
			$price = $data['price'];				//单价
			$number = $data['number'];				//数量
			$amount = $data['amount'];				//小计
			$photo = ($data['photo']) 
				? $data['photo'] : 'default.gif';	//图片
			$total_price +=$amount;					//总价格
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td><a href="show.php?product_id=<?php echo $id ?>"> 
		<b><?php echo htmlspecialchars($name) ?></b></a></td>
    <td><?php echo MoneyFormat($price) ?> 元</td>
    <td><?php echo $number ?></td>
    <td><?php echo MoneyFormat($amount) ?> 元</td>
  </tr>
  <?php
		}//endwhile
  ?>
  <tr bgcolor="#e7f0ff">
    <td colspan="3" align="right"><strong>合计金额</strong></td>
    <td><strong><?php echo MoneyFormat($total_price) ?> 元</strong></td>
  </tr>
  <?php
  	}else{
	  ?>
		<tr>
		  <td align="center" colspan="4" bgcolor="#FFFFFF">购物车没有任何商品</td>
		</tr>
	  <?
	}
  ?>
</table>
<?php
  //将有效订单插入数据库
  if($total_price)
  {
	$sql = "INSERT INTO orders 
			(order_id, session_id, total_price, user_name, email, address, postcode, tel_no, content)
		  VALUES ('$order_id', '$session_id', '$total_price', '$user_name', 
			'$email', '$address' , '$postcode', '$tel_no', '$content');";
	
	mysql_query($sql);
  }

  //重新生成session_id;
  session_regenerate_id();
  session_write_close();
  $new_sessionid = session_id();

  include "footer.inc.php";		//公用尾部页面
?>
