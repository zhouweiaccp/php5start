<?php
  /*****************************************/
  /*    文件名：admin/category_edit.php    */
  /*    说明：商品类别管理页面             */
  /*****************************************/
  include "../config.inc.php";	//配置文件
  include "header.inc.php";		//管理界面公用头文件

  $action = $_POST['action'];					//行为
  $category_name = $_POST['category_name'];		//类别名
  $category_id = $_POST['category_id'];			//类别名ID

  //添加类别名称
  if($action == 'addcat')
  {
  	if(empty($category_name)) {
  		ExitMessage("请填写类别名称！");
  	}

  	//检查类别名是否重名
  	$sql = "SELECT * FROM categories WHERE category_name='$category_name'";
  	$result = mysql_query($sql);

  	if(mysql_num_rows($result)>0)
	{
  		//类别名已经存在，输出错误信息
  		ExitMessage("类别名已经存在，请选择其他名称！");
  	}
	else
	{
  		//类别名不存在，添加新类别
  		$sql = "INSERT INTO categories (category_name) VALUES('$category_name')";
  		$result = mysql_query($sql);
  		ExitMessage("新建类别已经成功！", "category.php");
  	}
  }

  //修改类别名称
  elseif($action == 'rencat')
  {
  	//要修改类别没有选择
  	if(empty($category_id)) {
  		ExitMessage("请选择要修改的类别！");
  	}	
  	//类别名称没有填写
  	elseif(empty($category_name))	{
  		ExitMessage("请填写新的类别名称！");
  	}

  	//检查类别名是否重名
  	$sql = "SELECT * FROM categories 
  			WHERE category_name='$category_name' AND category_id<>'$category_id'";
  	$result = mysql_query($sql);
  	
  	if(mysql_num_rows($result) >0){
  		//类别名已经存在，输出错误信息
  		ExitMessage("类别名已经存在，请选择其他名称！");
  	}
	else
	{
  		//类别名不存在，修改类别名
  		$sql = "UPDATE categories SET category_name='$category_name'
  				WHERE category_id='$category_id'";
  		$result = mysql_query($sql);
  		ExitMessage("类别名称已经修改成功！", "category.php");
  	}
  }

  //删除类别
  elseif($action == 'delcat') {
  	//要删除类别没有选择
  	if(empty($category_id)) {
  		ExitMessage("请选择要删除的类别！");
  	}	

  	//检查该类别下是否存在商品
  	$sql = "SELECT * FROM products WHERE category_id='$category_id'";
  	$result = mysql_query($sql);

  	if(mysql_num_rows($result) >0) 
	{
		//该分类下存在商品，无法删除类别
   		ExitMessage("该类别下还存在商品，无法删除！");
  	}
	else
	{
  		//删除类别名
  		$sql = "DELETE FROM categories WHERE category_id='$category_id'";
  		$result = mysql_query($sql);
   		ExitMessage("类别已经删除成功！", "category.php");
  	}
  } 
  else
  {
  	ExitMessage("系统参数错误！");
  }
?>
