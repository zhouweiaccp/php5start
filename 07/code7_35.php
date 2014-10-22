<?php
	//上传文件的存储目录
	$uploaddir = "/home/tom/public_html/uploads/";

	//文件上传后全路径名称
	$uploadfile = $uploaddir. $_FILES["upfile"]["name"];
	
	if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $uploadfile)) 
	{
	    print "文件上传成功！\n";
	    print_r($_FILES);
	} else {
	    print "文件上传失败！\n";
	    print_r($_FILES);
	}
?>
