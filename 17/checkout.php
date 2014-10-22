<?php
  /*************************************/
  /*    文件名：checkout.php           */
  /*    说明：顾客信息登记表单页面     */
  /*************************************/
  include "config.inc.php";		//配置文件
  include "header.inc.php";		//公用头文件

  $session_id = session_id();	//用户身份标识

  //取得购物车信息
  $sql = "SELECT s.*, s.number*p.price AS amount, 
		p.product_id, p.product_name, p.price, p.photo FROM products p
		JOIN carts s ON s.product_id=p.product_id
		WHERE session_id='$session_id'
		ORDER BY p.product_name DESC";
  $result = mysql_query($sql);

  //购物记录数量
  $numrows = mysql_num_rows($result);

  //如果没有记录，返回购物车页面
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
	if (form.user_name.value =='') {	alert('用户姓名必须填写！'); return false;}
	else if (form.email.value =='') { alert('电子邮件地址必须填写！');	 return false;}
	else if (form.address1.value =='') { alert('收货详细地址必须填写！'); return false;}
	else if (form.tel_no.value =='') {alert('联系电话必须填写'); return false;}
	return true;
  }
//-->
</script>

<form name="" action="checkout2.php" method="POST" onsubmit="return checkit(this)">
  <h2>个人信息</h2>
  <table border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr>
      <th align="right" bgcolor="#e7f0ff">用户姓名</th>
      <td bgcolor="#FFFFFF">
		<input name="user_name" type="text" id="user_name" size="40" maxlength="20">
	 </td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">电子邮件</th>
      <td bgcolor="#FFFFFF"><input name="email" type="text" size="40" maxlength="40"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">收货详细地址</th>
      <td bgcolor="#FFFFFF"><input type="text" name="address1" size="40"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">地址2</th>
      <td bgcolor="#FFFFFF"><input type="text" name="address2" size="40"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">邮政编码</th>
      <td bgcolor="#FFFFFF"><input name="postcode" type="text" id="postcode" maxlength="6"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">联系电话</th>
      <td bgcolor="#FFFFFF"><input name="tel_no" type="text" id="tel_no" maxlength="20"></td>
    </tr>
    <tr>
      <th align="right" bgcolor="#e7f0ff">备注</th>
      <td bgcolor="#FFFFFF"><textarea name="content" cols="40" rows="5"></textarea></td>
    </tr>
  </table>
  <p>用户信息必须填写清楚，否则无法收到定购的商品。</p>
  <p>
    <input type="submit" value=" 生成定单 ">
  </p>
</form>
<h2>购物车</h2>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
    <th>商品名称</th>
    <th>价格</th>
    <th>数量</th>
    <th>小计</th>
  </tr>
  <?php
	if($numrows>0) {
		$total_price = 0;
	
		//循环遍历，输出结果
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id'];					//商品ID
			$name = $data['product_name'];				//商品名称
			$price = $data['price'];					//单价
			$number = $data['number'];					//数量
			$amount = $data['amount'];					//小计
			$photo = ($data['photo']) 
					? $data['photo'] : 'default.gif';	//图片
			$total_price +=$amount;						//总价格
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td><a href="show.php?product_id=<?php echo $id ?>">
			 <b><?php echo htmlspecialchars($name) ?></b></a>
    </td>
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
  include "footer.inc.php";		//公用尾部页面
?>
