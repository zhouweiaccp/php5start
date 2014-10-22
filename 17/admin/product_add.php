<?php
  /***************************************/
  /*    �ļ�����admin/product_add.php    */
  /*    ˵���������Ʒҳ��               */
  /***************************************/
  include "../config.inc.php";	//�����ļ�
  include "header.inc.php";		//������湫��ͷ�ļ�

  if($_POST['submit'])
  {
	$error_msg = array();
	if(empty($_POST['category_id'])){
		$error_msg[] = "��Ʒ�������ѡ��";
	}
	if(empty($_POST['product_name'])){
		$error_msg[] = "��Ʒ���Ʊ�����д��";
	}
	if(empty($_POST['price'])){
		$error_msg[] = "��Ʒ���۱�����д��";
	}elseif(!is_numeric($_POST['price'])){
		$error_msg[] = "��Ʒ���۱���Ϊ���֡�";	
	}

	if($_FILES['photo']['size']>0 && $_FILES['photo']['name'])
	{
		if(!($_FILES['photo']['type']=='image/gif' || $_FILES['photo']['type']=='image/pjpeg'))
		{
			$error_msg[] = "��ƷͼƬֻ��ΪGIF����JPGE��ʽ��";
		}else{
			list($tmp,$file_ext) = explode("/",$_FILES['photo']['type']);
			$photo_name = mt_rand()."_".time().".".$file_ext;
			if(!move_uploaded_file($_FILES['photo']['tmp_name'], UPLOAD_PATH.$photo_name))
			{
				$error_msg[] = "��ƷͼƬ����ʧ�ܡ�";
			}
		}
	}

	if(empty($_POST['detail']))
	{
		$error_msg[] = "��Ʒ��ϸ��Ϣ������д��";
	}

	//�����Ƿ��д�ı�־
	$has_error = isset($error_msg[0]); 
	if(!$has_error)
	{
		//�����ݲ������ݿ�
		$sql = "INSERT INTO products(category_id , product_name, price, detail, is_commend,
						 photo, post_datetime)
			    VALUES('".$_POST['category_id']."',
					   '".$_POST['product_name']."',
					   '".$_POST['price']."',
					   '".$_POST['detail']."',
					   '".intval($_POST['is_commend'])."',
					   '$photo_name', NOW())";
		$result = mysql_query($sql);
	
		//�ж��ж��ټ�¼������
		if(mysql_affected_rows($db))
		{
			ExitMessage("��Ʒ������ӳɹ�!", "product.php?catid={$_POST[category_id]}");
		}else{
			ExitMessage("��Ʒ�������ʧ��!");
		}
	}
  }

  //�ж�������һ������ʱ���������ʾ��Ϣ
  if($has_error)
  { 
	showErrorBox($error_msg);
  }

  //ȡ����ƷID
  if(!isset($_POST['category_id']))
  {
	$_POST['category_id'] = $_GET['catid'];
  }
?>

<form method="post" action="product_add.php" enctype="multipart/form-data">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    �������Ʒ
    </caption>
    <tr>
      <th>��Ʒ����<font color="red">(*)</font></th>
      <td><select name="category_id">
          <option value="0">ѡ����Ʒ����</option>
          <?php echo optionCategories($_POST['category_id']) ?>
        </select></td>
    </tr>
    <tr>
      <th>��Ʒ����<font color="red">(*)</font></th>
      <td><input name="product_name" value="<?php echo html2text($_POST['product_name']) ?>"
	  		type="text" size="35" maxlength="20"></td>
    </tr>
    <tr>
      <th>����<font color="red">(*)</font></th>
      <td><input name="price" value="<?php echo html2text($_POST['price']) ?>"
	  		type="text" size="12" maxlength="20">
        Ԫ</td>
    </tr>
    <tr>
      <th>�Ƽ���Ʒ</th>
      <td><input name="is_commend" type="checkbox" value="1" 
				<?php if($_POST['is_commend']) echo "checked" ?>></td>
    </tr>
    <tr>
      <th>��ƷͼƬ</th>
      <td><input name="photo" type="file" size="50" /></td>
    </tr>
    <tr>
      <th>��ϸ����<font color="red">(*)</font></th>
      <td><textarea name="detail" rows="10" cols="50">
		<?php echo html2text($_POST['detail']) ?></textarea></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
  </table>
  <div class="submit">
    <input name="submit" type="submit" id="submit" value=" �� �� ">
    <input name="return" type="button" value=" �� �� " onclick="location.href='catalog.php'">
  </div>
</form>

</body>
</html>
