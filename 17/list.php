<?php
  /********************************/
  /*	  �ļ�����list.php	      */
  /*	  ˵������Ʒ�����б�	  */
  /********************************/
  include "config.inc.php";		//�����ļ�
  include "header.inc.php";		//����ͷ�ļ�

  $each_page = EACH_PAGE;		  			//ÿҳ���������ʾ�ļ�¼��
  $offset = intval($_GET['offset']);		//��¼ƫ����
  $category_id = intval($_GET['catid']);	//��Ʒ���ID
?>

<h2>��Ʒ�б�</h2>
ѡ����Ʒ����
<select name="catid" onchange="location='?catid='+this.options[this.selectedIndex].value">
 <option value="0">ѡ����Ʒ����</option>
<?php echo OptionCategories($category_id) ?>
</select>
<br><br>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#0066CC">
  <tr bgcolor="#e7f0ff">
	<th>ͼƬ</th>
	<th>��Ʒ����</th>
	<th>�۸�</th>
	<th>����</th>
  </tr>
  <?php
	//ȡ�ø�����Ʒ��¼����
	$sql = "SELECT Count(*) FROM products WHERE category_id='$category_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$total = $row[0];	 //��Ʒ����

	//�淶$offset
	if($offset<0)			$offset = 0;
	elseif($offset > $total)	$offset = $total;

	//ȡ����Ʒ���б���Ϣ
	$sql = "SELECT product_id, product_name, photo, price FROM products 
		  WHERE category_id='$category_id'
		  ORDER BY post_datetime DESC LIMIT $offset, $each_page";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);

	//�жϼ�¼��
	if($numrows>0)
	{
		//ѭ�������������Ʒ��Ϣ�б�
		while($data = mysql_fetch_array($result))
		{
			$id = $data['product_id']; 				//��ƷID
			$name = $data['product_name']; 			//��Ʒ����
			$price = MoneyFormat($data['price']); 	//�۸�
			$photo = ($data['photo']) 
				? $data['photo'] : 'default.gif'; 	//ͼƬ
  ?>
  <tr align="center" bgcolor="#FFFFFF">
	<td><img src="uploads/<?php echo $photo ?>" width=85></td>
	<td><a href="show.php?product_id=<?php echo $id ?>">
			<b><?php echo htmlspecialchars($name) ?></b></a></td>
	<td><?php echo $price ?> Ԫ</td>
	<td><input name="update" type="button" value="��������"
		 onclick="location.href='docart.php?action=addcart&product_id=<?php echo $id ?>&number=1'">
	</td>
  </tr>
  <?php
		}//endwhile
  	}else{
	  ?><tr bgcolor="#FFFFFF">
		<td colspan="4" align="center">��������ʱû���κ���Ʒ</td>
		</tr>
	   <?
	}
  ?>
</table>

<p>�� <font color=red><b><?php echo $total ?></b></font> ����¼ &nbsp;<b>
<?php
  //Ϊ��ҳ׼��
  //���ǰһҳ������
  $last_offset = $offset - $each_page;
  if($last_offset<0)
  {
	?>ǰһҳ<?
  }else{
	?><a href="?offset=<?php echo $last_offset ?>&catid=<?php echo $category_id ?>">ǰһҳ</a><?
  }

  echo " &nbsp; ";

  //�����һҳ������
  $next_offset = $offset + $each_page;
  if($next_offset>=$total)
  {
	?>��һҳ<?
  }else{
	?><a href="?offset=<?php echo $next_offset ?>&catid=<?php echo $category_id ?>">��һҳ</a><?
  }
?>
</b>
</p>
<?php
  include "footer.inc.php";		//����β��ҳ��
?>
