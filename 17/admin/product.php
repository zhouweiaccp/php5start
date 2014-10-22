<?php
  /***********************************/
  /*    文件名：admin/product.php    */
  /*    说明：添加商品列表页面       */
  /***********************************/
  include "../config.inc.php";	//配置文件
  include "header.inc.php";	//管理界面公用头文件

  $each_page = EACH_PAGE;			//每页允许显示的最大记录数
  $offset = intval($_GET['offset']);			//偏移量
  $category_id = intval($_GET['catid']);		//商品类别
?>

<div class="btnInsert"> 
  <a href="product_add.php?catid=<?php echo $category_id ?>">添加新商品</a> 
</div>
选择商品分类
<select name="catid" onchange="location='?catid='+this.options[this.selectedIndex].value">
  <option value="0">选择商品分类</option>
  <?php echo optionCategories($category_id) ?>
</select>
<br>
<br>
<table width="100%" class="main" cellspacing="1">
  <caption>商品管理</caption>
  <tr>
    <th>ID</th>
    <th>商品名称</th>
    <th>价格</th>
    <th>操作</th>
  </tr>
  <?php
	//总记录数
	$sql = "SELECT Count(*) FROM products WHERE category_id='$category_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$total = $row[0];

	//规范$offset
	if($offset<0)			$offset = 0;
	elseif($offset > $total)	$offset = $total;

	$result = mysql_query($sql);

	//查询记录
	$sql = "SELECT product_id, product_name, price FROM products 
		  WHERE category_id='$category_id' ORDER BY post_datetime DESC
		  LIMIT $offset, $each_page";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	if($numrows>0)
	{
		//循环遍历，输出数据
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id'];
			$name = $data['product_name'];
			$price = $data['price'];
  ?>
  <tr align="center">
    <td><?php echo $id ?></td>
    <td>
	<a href="product_edit.php?product_id=<?php echo $id ?>">
		 <?php echo htmlspecialchars($name) ?></a>
    </td>
    <td><?php echo MoneyFormat($price) ?> 元</td>
    <td><input name="update" type="button" value="编辑"
		 onclick="location.href='product_edit.php?product_id=<?php echo $id ?>'">
	 &nbsp;
      <input name="delete" type="button" value="删除" onclick="if(confirm('确实要删除该商品吗?'))
		 location.href='product_del.php?product_id=<?php echo $id ?>'">
	</td>
  </tr>
  <?php
		}//endwhile
  	}else{
  		?>
		  <tr>
		    <td align="center" colspan="4">本分类暂时没有任何商品</td>
		  </tr>
		<?
	}
  ?>
</table>
<p>共 <font color=red><b><?php echo $total ?></b></font> 条记录 &nbsp;<b>

<?php
  //为分页准备
  $last_offset = $offset - $each_page;
  if($last_offset<0){
	?>前一页<?
  }else{
	?><a href="?offset=<?php echo $last_offset ?>&catid=<?php echo $category_id ?>">前一页</a><?
  }

  echo " &nbsp; ";

  $next_offset = $offset + $each_page;		
  if($next_offset>=$total)
  {
	?>后一页<?
  }else{
	?><a href="?offset=<?php echo $next_offset ?>&catid=<?php echo $category_id ?>">后一页</a> <?
  }
?>
  </b></p>
</body>
</html>
