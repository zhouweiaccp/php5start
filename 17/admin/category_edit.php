<?php
  /*****************************************/
  /*    �ļ�����admin/category_edit.php    */
  /*    ˵������Ʒ������ҳ��             */
  /*****************************************/
  include "../config.inc.php";	//�����ļ�
  include "header.inc.php";		//������湫��ͷ�ļ�

  $action = $_POST['action'];					//��Ϊ
  $category_name = $_POST['category_name'];		//�����
  $category_id = $_POST['category_id'];			//�����ID

  //����������
  if($action == 'addcat')
  {
  	if(empty($category_name)) {
  		ExitMessage("����д������ƣ�");
  	}

  	//���������Ƿ�����
  	$sql = "SELECT * FROM categories WHERE category_name='$category_name'";
  	$result = mysql_query($sql);

  	if(mysql_num_rows($result)>0)
	{
  		//������Ѿ����ڣ����������Ϣ
  		ExitMessage("������Ѿ����ڣ���ѡ���������ƣ�");
  	}
	else
	{
  		//����������ڣ���������
  		$sql = "INSERT INTO categories (category_name) VALUES('$category_name')";
  		$result = mysql_query($sql);
  		ExitMessage("�½�����Ѿ��ɹ���", "category.php");
  	}
  }

  //�޸��������
  elseif($action == 'rencat')
  {
  	//Ҫ�޸����û��ѡ��
  	if(empty($category_id)) {
  		ExitMessage("��ѡ��Ҫ�޸ĵ����");
  	}	
  	//�������û����д
  	elseif(empty($category_name))	{
  		ExitMessage("����д�µ�������ƣ�");
  	}

  	//���������Ƿ�����
  	$sql = "SELECT * FROM categories 
  			WHERE category_name='$category_name' AND category_id<>'$category_id'";
  	$result = mysql_query($sql);
  	
  	if(mysql_num_rows($result) >0){
  		//������Ѿ����ڣ����������Ϣ
  		ExitMessage("������Ѿ����ڣ���ѡ���������ƣ�");
  	}
	else
	{
  		//����������ڣ��޸������
  		$sql = "UPDATE categories SET category_name='$category_name'
  				WHERE category_id='$category_id'";
  		$result = mysql_query($sql);
  		ExitMessage("��������Ѿ��޸ĳɹ���", "category.php");
  	}
  }

  //ɾ�����
  elseif($action == 'delcat') {
  	//Ҫɾ�����û��ѡ��
  	if(empty($category_id)) {
  		ExitMessage("��ѡ��Ҫɾ�������");
  	}	

  	//����������Ƿ������Ʒ
  	$sql = "SELECT * FROM products WHERE category_id='$category_id'";
  	$result = mysql_query($sql);

  	if(mysql_num_rows($result) >0) 
	{
		//�÷����´�����Ʒ���޷�ɾ�����
   		ExitMessage("������»�������Ʒ���޷�ɾ����");
  	}
	else
	{
  		//ɾ�������
  		$sql = "DELETE FROM categories WHERE category_id='$category_id'";
  		$result = mysql_query($sql);
   		ExitMessage("����Ѿ�ɾ���ɹ���", "category.php");
  	}
  } 
  else
  {
  	ExitMessage("ϵͳ��������");
  }
?>
