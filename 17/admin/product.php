<?php
  /***********************************/
  /*    �ļ�����admin/product.php    */
  /*    ˵���������Ʒ�б�ҳ��       */
  /***********************************/
  include "../config.inc.php";	//�����ļ�
  include "header.inc.php";	//������湫��ͷ�ļ�

  $each_page = EACH_PAGE;			//ÿҳ������ʾ������¼��
  $offset = intval($_GET['offset']);			//ƫ����
  $category_id = intval($_GET['catid']);		//��Ʒ���
?>

<div class="btnInsert"> 
  <a href="product_add.php?catid=<?php echo $category_id ?>">�������Ʒ</a> 
</div>
ѡ����Ʒ����
<select name="catid" onchange="location='?catid='+this.options[this.selectedIndex].value">
  <option value="0">ѡ����Ʒ����</option>
  <?php echo optionCategories($category_id) ?>
</select>
<br>
<br>
<table width="100%" class="main" cellspacing="1">
  <caption>��Ʒ����</caption>
  <tr>
    <th>ID</th>
    <th>��Ʒ����</th>
    <th>�۸�</th>
    <th>����</th>
  </tr>
  <?php
	//�ܼ�¼��
	$sql = "SELECT Count(*) FROM products WHERE category_id='$category_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$total = $row[0];

	//�淶$offset
	if($offset<0)			$offset = 0;
	elseif($offset > $total)	$offset = $total;

	$result = mysql_query($sql);

	//��ѯ��¼
	$sql = "SELECT product_id, product_name, price FROM products 
		  WHERE category_id='$category_id' ORDER BY post_datetime DESC
		  LIMIT $offset, $each_page";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	if($numrows>0)
	{
		//ѭ���������������
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
    <td><?php echo MoneyFormat($price) ?> Ԫ</td>
    <td><input name="update" type="button" value="�༭"
		 onclick="location.href='product_edit.php?product_id=<?php echo $id ?>'">
	 &nbsp;
      <input name="delete" type="button" value="ɾ��" onclick="if(confirm('ȷʵҪɾ������Ʒ��?'))
		 location.href='product_del.php?product_id=<?php echo $id ?>'">
	</td>
  </tr>
  <?php
		}//endwhile
  	}else{
  		?>
		  <tr>
		    <td align="center" colspan="4">��������ʱû���κ���Ʒ</td>
		  </tr>
		<?
	}
  ?>
</table>
<p>�� <font color=red><b><?php echo $total ?></b></font> ����¼ &nbsp;<b>

<?php
  //Ϊ��ҳ׼��
  $last_offset = $offset - $each_page;
  if($last_offset<0){
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
	?><a href="?offset=<?php echo $next_offset ?>&catid=<?php echo $category_id ?>">��һҳ</a> <?
  }
?>
  </b></p>
</body>
</html>
