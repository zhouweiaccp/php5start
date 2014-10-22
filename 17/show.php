<?php
  /************************************/
  /*      文件名：show.php            */
  /*      说明：商品详细信息页面      */
  /************************************/
  include "config.inc.php";		//配置文件
  include "header.inc.php";		//公用头文件

  $product_id = intval($_REQUEST['product_id']); 	//商品ID

  //取得商品数据
  $result = mysql_query("SELECT p.*, c.* FROM products p
					JOIN categories c ON c.category_id = p.category_id
					WHERE p.product_id='$product_id'");
  $data = mysql_fetch_array($result);
?>

<form method="get" action="docart.php">
<h2>商品情报</h2>
  <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
    <tr>
      <th bgcolor="#e7f0ff" width="20%">商品分类</th>
      <td bgcolor="#FFFFFF"><?php echo htmlspecialchars($data['category_name']) ?></td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">商品名称</th>
      <td bgcolor="#FFFFFF"><b><?php echo htmlspecialchars($data['product_name']) ?></b>
    			<?php if($data['is_commend']) echo "<font color=red>推荐!</font>" ?></td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">商品图片</th>
      <td bgcolor="#FFFFFF">
    	<?php if($data['photo']) { ?>
    		<img src="uploads/<?php echo $data['photo'] ?>" border="1" width="200"><br>
    	<?php } ?>
       </td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">单价</th>
      <td bgcolor="#FFFFFF">
      	<font color=red><?php echo MoneyFormat($data['price']) ?></font> 元
		<input type="hidden" name="action" value="addcart">
		<input type="hidden" name="product_id" value="<?php echo $product_id ?>">	
		<input name="number" value="1" type="text" size=4 maxlength="2">
		<input type="submit" value="加入购物车">&nbsp;<input type="image" src="img/buyit.gif" alt="订购">
	  </td>
	</tr>
	<tr>
      <th bgcolor="#e7f0ff">详细介绍</th>
      <td bgcolor="#FFFFFF"><?php echo nl2br(htmlspecialchars($data['detail'])) ?></td>
    </tr>
  </table>
</form>
<?php
  include "footer.inc.php";		//公用尾部页面
?>
