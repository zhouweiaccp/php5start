<?php
	//һ��ͼƬ�ļ�
	$name = "img.png";

	//����ͷ��Ϣ
	header("Content-Type: image/png");
	header("Content-Disposition: attachment; filename=\"$name\"");
	header("Content-Length: ".filesize($name));

	//����ļ�
	readfile($fp);
?>
