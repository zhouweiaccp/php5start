<?php
  /********************************/
  /*	  文件名：list.php	      */
  /*	  说明：商品分类列表	  */
  /********************************/
  include "config.inc.php";		//配置文件
  include "header.inc.php";		//公用头文件

  $each_page = EACH_PAGE;		  			//每页最多允许显示的记录数
  $offset = intval($_GET['offset']);		//记录偏移量
  $category_id = intval($_GET['catid']);	//商品类别ID
?>

<h2>商品列表</h2>
选择商品分类
<select name="catid" onchange="location='?catid='+this.options[this.selectedIndex].value">
 <option value="0">选择商品分类</option>
<?php echo OptionCategories($category_id) ?>
</select>
<br><br>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
	<th>图片</th>
	<th>商品名称</th>
	<th>价格</th>
	<th>操作</th>
  </tr>
  <?php
	//取得该类商品记录总数
	$sql = "SELECT Count(*) FROM products WHERE category_id='$category_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$total = $row[0];	 //商品总数

	//规范$offset
	if($offset<0)			$offset = 0;
	elseif($offset > $total)	$offset = $total;

	//取得商品的列表信息
	$sql = "SELECT product_id, product_name, photo, price FROM products 
		  WHERE category_id='$category_id'
		  ORDER BY post_datetime DESC LIMIT $offset, $each_page";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	//判断记录数
	if($numrows>0)
	{
		//循环遍历，输出商品信息列表
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id']; 				//商品ID
			$name = $data['product_name']; 			//商品名称
			$price = MoneyFormat($data['price']); 	//价格
			$photo = ($data['photo']) 
				? $data['photo'] : 'default.gif'; 	//图片
  ?>
  <tr align="center" bgcolor="#FFFFFF">
	<td><img src="uploads/<?php echo $photo ?>" width=85></td>
	<td><a href="show.php?product_id=<?php echo $id ?>">
			<b><?php echo htmlspecialchars($name) ?></b></a></td>
	<td><?php echo $price ?> 元</td>
	<td><input name="update" type="button" value="立即购买"
		 onclick="location.href='docart.php?action=addcart&product_id=<?php echo $id ?>&number=1'">
	</td>
  </tr>
  <?php
		}//endwhile
  	}else{
	  ?><tr bgcolor="#FFFFFF">
		<td colspan="4" align="center">本分类暂时没有任何商品</td>
		</tr>
	   <?
	}
  ?>
</table>

<p>共 <font color=red><b><?php echo $total ?></b></font> 条记录 &nbsp;<b>
<?php
  //为分页准备
  //输出前一页的链接
  $last_offset = $offset - $each_page;
  if($last_offset<0)
  {
	?>前一页<?
  }else{
	?><a href="?offset=<?php echo $last_offset ?>&catid=<?php echo $category_id ?>">前一页</a><?
  }

  echo " &nbsp; ";

  //输出后一页的链接
  $next_offset = $offset + $each_page;
  if($next_offset>=$total)
  {
	?>后一页<?
  }else{
	?><a href="?offset=<?php echo $next_offset ?>&catid=<?php echo $category_id ?>">后一页</a><?
  }
?>
</b>
</p>
<?php
  include "footer.inc.php";		//公用尾部页面
?>
