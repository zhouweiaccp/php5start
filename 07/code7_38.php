<?php
	//文件上传目录
	$uploaddir = "/home/tom/public_html/uploads/";

	//循环遍历$_FILE数组进行判断
	for($i=0; $i<count($_FILES['upfile']['name']); $i++)
	{
		//错误数组
		$error = array();

		//判断文件大小
		if($_FILES['upfile']['size'][$i] >= 40000)
		{
			$error[] = "文件的尺寸太大！";
		}

		//判断文件类型
		if($_FILES['upfile']['type'][$i] != "text/plain")
		{
			$error[] = "文件的类型必须为文本文件！";
		}

		//其他错误类型
		if($_FILES['upfile']['error'][$i] != UPLOAD_ERR_OK)
		{
			$error[] = "文件上传失败！";
		}
	
		echo "文件{$i}：".$_FILES['upfile']['name'][$i]."<br>\n";
	
		if(count($error))
		{
			//发现错误
			echo join("<br>", $error);
		}else{
			move_uploaded_file($_FILES['upfile']['tmp_name'][$i],
							$uploaddir . $_FILES['upfile']['name'][$i]);
		}
		echo "<hr>";
	}
?>
