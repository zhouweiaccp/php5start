<?php
  /***************************************/
  /*    文件名：admin/product_add.php    */
  /*    说明：添加商品页面               */
  /***************************************/
  include "../config.inc.php";	//配置文件
  include "header.inc.php";		//管理界面公用头文件

  if($_POST['submit'])
  {
	$error_msg = array();
	if(empty($_POST['category_id'])){
		$error_msg[] = "商品分类必须选择。";
	}
	if(empty($_POST['product_name'])){
		$error_msg[] = "商品名称必须填写。";
	}
	if(empty($_POST['price'])){
		$error_msg[] = "商品单价必须填写。";
	}elseif(!is_numeric($_POST['price'])){
		$error_msg[] = "商品单价必须为数字。";	
	}

	if($_FILES['photo']['size']>0 && $_FILES['photo']['name'])
	{
		if(!($_FILES['photo']['type']=='image/gif' || $_FILES['photo']['type']=='image/pjpeg'))
		{
			$error_msg[] = "商品图片只能为GIF或者JPGE格式。";
		}else{
			list($tmp,$file_ext) = explode("/",$_FILES['photo']['type']);
			$photo_name = mt_rand()."_".time().".".$file_ext;
			if(!move_uploaded_file($_FILES['photo']['tmp_name'], UPLOAD_PATH.$photo_name))
			{
				$error_msg[] = "商品图片保存失败。";
			}
		}
	}

	if(empty($_POST['detail']))
	{
		$error_msg[] = "商品详细信息必须填写。";
	}

	//设置是否有错的标志
	$has_error = isset($error_msg[0]); 
	if(!$has_error)
	{
		//将数据插入数据库
		$sql = "INSERT INTO products(category_id , product_name, price, detail, is_commend,
						 photo, post_datetime)
			    VALUES('".$_POST['category_id']."',
					   '".$_POST['product_name']."',
					   '".$_POST['price']."',
					   '".$_POST['detail']."',
					   '".intval($_POST['is_commend'])."',
					   '$photo_name', NOW())";
		$result = mysql_query($sql);
	
		//判断有多少记录被插入
		if(mysql_affected_rows($db))
		{
			ExitMessage("商品内容添加成功!", "product.php?catid={$_POST[category_id]}");
		}else{
			ExitMessage("商品内容添加失败!");
		}
	}
  }

  //判定至少有一个错误时，就输出提示信息
  if($has_error)
  { 
	showErrorBox($error_msg);
  }

  //取得商品ID
  if(!isset($_POST['category_id']))
  {
	$_POST['category_id'] = $_GET['catid'];
  }
?>

<form method="post" action="product_add.php" enctype="multipart/form-data">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    添加新商品
    </caption>
    <tr>
      <th>商品分类<font color="red">(*)</font></th>
      <td><select name="category_id">
          <option value="0">选择商品分类</option>
          <?php echo optionCategories($_POST['category_id']) ?>
        </select></td>
    </tr>
    <tr>
      <th>商品名称<font color="red">(*)</font></th>
      <td><input name="product_name" value="<?php echo html2text($_POST['product_name']) ?>"
	  		type="text" size="35" maxlength="20"></td>
    </tr>
    <tr>
      <th>单价<font color="red">(*)</font></th>
      <td><input name="price" value="<?php echo html2text($_POST['price']) ?>"
	  		type="text" size="12" maxlength="20">
        元</td>
    </tr>
    <tr>
      <th>推荐商品</th>
      <td><input name="is_commend" type="checkbox" value="1" 
				<?php if($_POST['is_commend']) echo "checked" ?>></td>
    </tr>
    <tr>
      <th>商品图片</th>
      <td><input name="photo" type="file" size="50" /></td>
    </tr>
    <tr>
      <th>详细介绍<font color="red">(*)</font></th>
      <td><textarea name="detail" rows="10" cols="50">
		<?php echo html2text($_POST['detail']) ?></textarea></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
  </table>
  <div class="submit">
    <input name="submit" type="submit" id="submit" value=" 新 建 ">
    <input name="return" type="button" value=" 返 回 " onclick="location.href='catalog.php'">
  </div>
</form>

</body>
</html>
