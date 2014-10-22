<?php
	define("MAX_WIDTH_PIXEL", 600);
	define("MAX_HEIGHT_PIXEL", 240);

	//���ͱ�ͷ��Ϣ
	header("Content-type: image/gif");

	//����ͼ��
	$img = imageCreate(MAX_WIDTH_PIXEL, MAX_HEIGHT_PIXEL);

	//�趨��ɫ
	$white = imageColorAllocate($img, 255, 255, 255);
	$red = imageColorAllocate($img, 255, 0, 0);
	$blue = imageColorAllocate($img, 0, 0, 255);
	$brown = imageColorAllocate($img, 100, 0, 0);
	$black = imageColorAllocate($img, 0, 0, 0);

	$width  = MAX_WIDTH_PIXEL/2;				//���
	$height = MAX_HEIGHT_PIXEL/2;				//�߶�

	//����������
	imageLine($img, $width, 0, $width, MAX_HEIGHT_PIXEL, $black);
	imageLine($img, 0, $height, MAX_WIDTH_PIXEL, $height, $black);

	//ͨ��ѭ����ʵ�ֺ���ͼ�ε����
	for($i=0; $i<=MAX_WIDTH_PIXEL; $i++)
	{
		$y1 = 100 * sin($i/100 * M_PI);
		imageSetPixel($img, $i, $height+$y1, $blue);

		$y2 = 100 * sin($i/300 * M_PI);
		imageSetPixel($img, $i, $height+$y2, $red);

		$y3 = 100 * sin($i/300 * M_PI);
		imageSetPixel($img, $i, $height-$y3, $brown);
	}

	//��ʾͼ��
	imageGif($img);

	//�ͷ���Դ
	imageDestroy($img);
?>
