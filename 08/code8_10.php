<?php
	$rs = fopen("photo.jpeg", "rb");				//ʹ�ö����ƶ�ͼƬ�ļ�
	$data = "";
	while($str = fread($rs, 1024))
	{
		$data .= $str;
	}

	$img = imageCreateFromString($data);		//�ɶ������ַ�������ͼƬ
	if ($img !== false)
	{
		//���ɸ�ʽת�����ͼ��
		imagePNG($img, "photo.png");

		echo 'JPEG��ʽת��ΪPNG��ʽ��';
	} else {
		echo 'ͼ���ʽת������';
	}
?>
