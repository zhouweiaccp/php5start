<?php
	$img = imagecreate(100, 100);

	//��ɫ��������ɫ�ı�
	$bg = imagecolorallocate($img, 255, 255, 255);
	$textcolor = imagecolorallocate($img, 0, 0, 255);

	//���ַ������к�����ֱ����
	$string = "TaoDoor.com";
	imageString($img, 5, 0, 5, $string, $textcolor);
	imageStringUp($img, 5, 75, 98, $string, $textcolor);

	//б������ַ�
	$chars = array("I", "L", "O", "V", "E");
	for($i=0; $i<count($chars); $i++){
		imageChar($img, 4, $i*12, 85-$i*10, $chars[$i], $textcolor);
	}

	//���ͼ��
	header("Content-type: image/png");
	imagepng($img);
?>
