<?php
  /*********************************/
  /*    �ļ�����admin/order.php    */
  /*    ˵���������б�ҳ��         */
  /*********************************/
  include "../config.inc.php";	//�����ļ�
  include "header.inc.php";		//������湫��ͷ�ļ�

  $each_page = EACH_PAGE;				//ÿҳ������ʾ������¼��
  $offset = intval($_GET['offset']);	//ƫ����
?>

<br>
<table width="100%" class="main" cellspacing="1">
  <caption>��������</caption>
  <tr>
    <th>������</th>
    <th>������</th>
    <th>�ܼ۸�</th>
    <th>����</th>
    <th width="20%">��ϸ</th>
  </tr>
  <?php
	//�ܼ�¼��
	$sql = "SELECT Count(*) FROM orders";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$total = $row[0];

	//�淶$offset
	if($offset<0)
		$offset = 0;
	elseif($offset > $total)
		$offset = $total;

	//���ɶ����б�
	$sql = "SELECT total_price, order_id, user_name FROM orders 
		  ORDER BY order_id DESC LIMIT $offset, $each_page";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	if($numrows>0)
	{
		//ѭ���������
		while($data = mysql_fetch_array($result))
		{
			$order_id = $data['order_id'];
			$user_name = $data['user_name'];
			$total_price = $data['total_price'];
  ?>
  <tr align="center">
    <td>M<?php echo $order_id ?></td>
    <td><?php echo htmlspecialchars($user_name) ?></td>
    <td><?php echo MoneyFormat($total_price) ?> Ԫ</td>
    <td><?php echo date("Y-m-d H:i", $order_id) ?></td>
    <td><input name="update" type="button" value="��ϸ"
		 onclick="location.href='order_show.php?order_id=<?php echo $order_id ?>'" />
    </td>
  </tr>
  <?php
		}//endwhile 
  	}else{
	  ?>
  		<tr>
			<td align="center" colspan="4">û���κ���Ʒ</td>
		</tr>
  	  <?
	}
  ?>
</table>
<p>�� <font color=red><b><?php echo $total ?></b></font> ����¼ &nbsp;<b>

<?php
  //Ϊ��ҳ׼��
  $last_offset = $offset - $each_page;
  if($last_offset<0)
  {
	?>ǰһҳ<?
  }else{
	?><a href="?offset=<?php echo $last_offset ?>&catid=<?php echo $category_id ?>">ǰһҳ</a><?
  }

  echo " &nbsp; ";

  $next_offset = $offset + $each_page;
  if($next_offset>=$total)
  {
	?>��һҳ<?
  }else{
	?><a href="?offset=<?php echo $next_offset ?>&catid=<?php echo $category_id ?>">��һҳ</a><?
  }
?>
  </b></p>
</body>
</html>
