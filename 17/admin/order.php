<?php
  /*********************************/
  /*    文件名：admin/order.php    */
  /*    说明：定单列表页面         */
  /*********************************/
  include "../config.inc.php";	//配置文件
  include "header.inc.php";		//管理界面公用头文件

  $each_page = EACH_PAGE;				//每页允许显示的最大记录数
  $offset = intval($_GET['offset']);	//偏移量
?>

<br>
<table width="100%" class="main" cellspacing="1">
  <caption>订单管理</caption>
  <tr>
    <th>订单号</th>
    <th>订单人</th>
    <th>总价格</th>
    <th>日期</th>
    <th width="20%">详细</th>
  </tr>
  <?php
	//总记录数
	$sql = "SELECT Count(*) FROM orders";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$total = $row[0];

	//规范$offset
	if($offset<0)
		$offset = 0;
	elseif($offset > $total)
		$offset = $total;

	//生成订单列表
	$sql = "SELECT total_price, order_id, user_name FROM orders 
		  ORDER BY order_id DESC LIMIT $offset, $each_page";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	if($numrows>0)
	{
		//循环输出数据
		while($data = mysql_fetch_array($result))
		{
			$order_id = $data['order_id'];
			$user_name = $data['user_name'];
			$total_price = $data['total_price'];
  ?>
  <tr align="center">
    <td>M<?php echo $order_id ?></td>
    <td><?php echo htmlspecialchars($user_name) ?></td>
    <td><?php echo MoneyFormat($total_price) ?> 元</td>
    <td><?php echo date("Y-m-d H:i", $order_id) ?></td>
    <td><input name="update" type="button" value="详细"
		 onclick="location.href='order_show.php?order_id=<?php echo $order_id ?>'" />
    </td>
  </tr>
  <?php
		}//endwhile 
  	}else{
	  ?>
  		<tr>
			<td align="center" colspan="4">没有任何商品</td>
		</tr>
  	  <?
	}
  ?>
</table>
<p>共 <font color=red><b><?php echo $total ?></b></font> 条记录 &nbsp;<b>

<?php
  //为分页准备
  $last_offset = $offset - $each_page;
  if($last_offset<0)
  {
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
	?><a href="?offset=<?php echo $next_offset ?>&catid=<?php echo $category_id ?>">后一页</a><?
  }
?>
  </b></p>
</body>
</html>
