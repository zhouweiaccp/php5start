<?php
	//����ͼ��
	$img = imageCreate (300, 200);
	$background = ImageColorAllocate($img, 255, 255, 255);			//������Ϊ��ɫ
	$black = ImageColorAllocate ($img, 0, 0, 0);		  			//�趨��ɫ
	$white = $background;									//�趨��ɫ

	//���ͱ�ͷ��Ϣ
	header("Content-type: image/png");

	//���ƾ���
	imageRectangle($img, 30, 30, 180, 120, $black);
	imageRectangle($img, 60, 60, 210, 150, $black);

	//�����ɫ
	imageFill ($img, 100, 100,$black);

	//�������
	imageString ($img, 5, 75, 81, "Hello, PHP", $white);

	//���PNGͼ��
	imagePNG($img);

	//����ͼ��
	imageDestroy($img);
?>

