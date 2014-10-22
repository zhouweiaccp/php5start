<?php
  /******************************************/
  /*	  �ļ�����admin/product_edit.php	*/
  /*	  ˵�����༭��Ʒҳ��			    */
  /******************************************/
  include "../config.inc.php";	//�����ļ�
  include "header.inc.php";		//������湫��ͷ�ļ�

  $product_id = intval($_REQUEST['product_id']);	//��ƷID

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
		}
		else
		{
			list($tmp,$file_ext) = explode("/",$_FILES['photo']['type']);
			$photo_name = mt_rand()."_".time().".".$file_ext;
			if(!move_uploaded_file($_FILES['photo']['tmp_name'], UPLOAD_PATH.$photo_name))
			{
				$error_msg[] = "��ƷͼƬ����ʧ�ܡ�";
			}
		}
	}
	else
	{
		$photo_name = $_POST['old_photo'];
	}
	$photo = $photo_name;

	if(empty($_POST['detail']))
	{
		$error_msg[] = "��Ʒ��ϸ��Ϣ������д��";
	}

	$has_error = isset($error_msg[0]);		//�����Ƿ��д�ı�־
	if(!$has_error)
	{
		//�����ݲ������ݿ�
		$sql = "UPDATE products	SET
				category_id='".$_POST['category_id']."',
				product_name='".$_POST['product_name']."',
				price='".$_POST['price']."',
				detail='".$_POST['detail']."',
				is_commend='".$_POST['is_commend']."',
				photo='$photo_name'
			   WHERE product_id='$product_id'";
		$result = mysql_query($sql);
		
		//�ж��ж��ټ�¼������
		if(mysql_affected_rows($db)>=0)
		{
			ExitMessage("��Ʒ�����޸ĳɹ�!", "product.php?catid={$_POST[category_id]}");
		}else{
			ExitMessage("��Ʒ�����޸�ʧ��!");
		}
	}
  }else{
	//ȡ����Ʒ��¼
	$result = mysql_query("SELECT * FROM products WHERE product_id='$product_id'");
	$data = mysql_fetch_array($result);
	$_POST = $data;
	$photo = $data['photo'];
	$product_id = $data['product_id'];
  }

  //�ж�������һ������ʱ���������ʾ��Ϣ
  if($has_error)
  {
	showErrorBox($error_msg);
  }
?>

<form method="post" action="product_edit.php" enctype="multipart/form-data">
  <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
  <table width="100%" class="main" cellspacing="1">
    <caption>�༭��Ʒ</caption>
    <tr>
      <th>��Ʒ����<font color="red">(*)</font></th>
      <td><select name="category_id">
          <option value="0">ѡ����Ʒ����</option>
          <?php echo optionCategories($_POST['category_id']) ?>
        </select>
	 </td>
    </tr>
    <tr>
      <th>��Ʒ����<font color="red">(*)</font></th>
      <td><input name="product_name" value="<?php echo html2text($_POST['product_name']) ?>"
	  		type="text" size="35" maxlength="20">
	 </td>
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
				<?php if($_POST['is_commend']) echo "checked" ?>>
	 </td>
    </tr>
    <tr>
      <th>��ƷͼƬ</th>
      <td><?php if($photo) { ?>
        <img src="../uploads/<?php echo $photo ?>" border="1" width="100" height="80"><br>
        <input type="hidden" name="old_photo" value="<?php echo $photo ?>">
        <?php } ?>
        <input name="photo" type="file" size="50"></td>
    </tr>
    <tr>
      <th>��ϸ����<font color="red">(*)</font></th>
      <td><textarea name="detail" rows="10" cols="50">
		<?php echo html2text($_POST['detail']) ?></textarea></td>
    </tr>
  </table>
  <div class="submit">
    <input name="submit" type="submit" id="submit" value=" �� �� ">
    <input name="return" type="button" value=" �� �� " onclick="location.href='product.php'">
  </div>
</form>
