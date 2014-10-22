<?php
  /*******************************/
  /*      文件名：index.php      */
  /*      说明：商城首页         */
  /*******************************/
  include "config.inc.php";		//配置文件
  include "header.inc.php";		//公用头文件
?>

<h2>首页推荐</h2>
<?php
  //取得首页推荐商品
  $sql = "SELECT product_name, product_id, price, photo FROM products
  	    ORDER BY is_commend DESC, post_datetime DESC LIMIT 5";
  $result = mysql_query($sql);
?>
<!-- 首页推荐开始 -->
<table border="0" width="100%" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
  <?php
  	//循环输出推荐商品
  	while($data = mysql_fetch_array($result))
  	{
  		$product_id = $data['product_id'];							//商品ID
  		$product_name = htmlspecialchars($data['product_name']); 	//商品名称
  		$photo = ($data['photo']) ? $data['photo']:'default.gif';	//图片
  		$price = MoneyFormat($data['price']);						//价格
  ?>
  <td align="center"><a href="show.php?product_id=<?php echo $product_id ?>" ?>
  	<img border=0 src="uploads/<?php echo $photo ?>" height=85 width=85>
  	<br><?php echo $product_name ?>
  	</a><br><font color="red">￥<?php echo $price ?></font>
  </td>
  <?php } ?>
  </tr>
</table>
<!-- 首页推荐结束 -->

<h2>商品列表</h2>
<?php
  //取得商品的目录
  $sql = "SELECT * FROM categories ORDER BY category_name";
  $result = mysql_query($sql);

  //循环输出商品目录
  while($row = mysql_fetch_array($result))
  {
?>
  <table border="0" width="100%" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr bgcolor="#e7f0ff">
  	<th colspan="3" align="left">[*]
  	<?php
  	//输出带有链接的商品分类名称
  	echo "<a href=\"list.php?catid=$row[category_id]\">";
  	echo htmlspecialchars($row['category_name']);
  	echo "</a>";
  	?></th>
    </tr>
<?php
  	//取得分类下的商品信息
  	$sql2 = "SELECT product_name, product_id, price, is_commend FROM products
  		   WHERE category_id = '$row[category_id]'
  		   ORDER BY is_commend DESC, post_datetime DESC LIMIT 5";
  	$result2 = mysql_query($sql2);

  	//循环输出商品信息
  	while($row2 = mysql_fetch_array($result2))
  	{
?>
   <tr bgcolor="#FFFFFF">
  	<td width="5%"><?php echo $row2['product_id'] ?></td>
  	<td width="70%">
  	<?php if($row2['is_commend']){?>
  		<img src="img/star.gif" border=0 align="absmiddle">
  	<?php } ?>
	<a href="show.php?product_id=<?php echo $row2['product_id'] ?>">
		<?php echo htmlspecialchars($row2['product_name']) ?></a>
  	<a href="docart.php?product_id=<?php echo $row2['product_id'] ?>&action=addcart&number=1">
  		<img src="img/add.gif" border=0 align="absmiddle" height=15></a>
	</td>
	<td width="25%" align="right"><?php echo MoneyFormat($row2['price']) ?> 元</td>
  </tr>
<?php
  	}//结束商品信息的循环
  	$row2 = null;
?>
  	</table>
  	<br>
<?php
  }//结束商品目录循环
  include "footer.inc.php";		//公用尾部页面
?>
