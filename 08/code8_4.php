<?php
	//����PNGͼƬ�ĸߺͿ�
	$widht =501;
	$height=201;

	//����ͼƬ
	$image=imageCreate($widht, $height);

	//������ɫ
	$colorWhite=imageColorAllocate($image, 255, 255, 255);
	$colorGrey=imageColorAllocate($image, 192, 192, 192);
	$colorBlue=imageColorAllocate($image, 0, 0, 255);
	$colorRed =imageColorAllocate($image, 255, 0, 0);
	
	//������Χ��ͼƬ��Χ����
	for ($i=0; $i<=30; $i++)
	{
		imageline($image, 0, $i*20, 500, $i*20, $colorGrey);
		imageline($image, $i*20, 0, $i*20, 200, $colorGrey);
	}

	//���ƶ����
	$graphValues=array(1,142,45,190,80,181,120,105,23,13,150,55);
	imagePolygon($image, $graphValues, 6, $colorBlue);

	//���ƻ���
	imageArc($image, 250, 100, 200, 150, 40, 320, $colorRed);

	//����Բ��
	imageEllipse($image, 400, 100, 179, 179, $colorBlue);

	//�趨ͼ�ε��߿������ƾ���
	imageSetThickness($image, 3);
	imageRectangle($image, 250, 52, 400, 146, $colorRed);

	//���PNGͼ��
	header("Content-type: image/png");
	imagePNG($image);

	//������Դ
	imageDestroy($image);
?>
