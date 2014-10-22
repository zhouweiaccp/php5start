<?php
	//����ͼ��
	$image   = imageCreate(400, 200);
	$white  = imageColorAllocate($image, 0xFF, 0xFF, 0xFF);
	$navy   = imageColorAllocate($image, 0x00, 0x00, 0x80);
	$red    = imageColorAllocate($image, 0xFF, 0x00, 0x00);

	//���ĵ�
	$cx = 200;
	$cy = 100;

	//��������
	imageFilledArc($image, $cx, $cy, 200, 120, 30, 150 , $red, IMG_ARC_PIE);
	imageFilledArc($image, $cx, $cy, 200, 120, 30, 150 , $white, IMG_ARC_CHORD);

	//��������
	imageFilledArc($image, $cx, $cy, 200, 120, 150, 390, $navy, 
				 IMG_ARC_PIE + IMG_ARC_EDGED + IMG_ARC_NOFILL);

	//����Բ��
	imageFilledEllipse($image, $cx-50, $cy-50, 60, 40, $red);
	imageFilledEllipse($image, $cx-50, $cy-50, 20, 20, $white);

	//���ƾ�����
	imageFilledRectangle($image, $cx+30, $cy-75, $cx+70, $cy-25, $red);
	imageFilledEllipse($image, $cx+50, $cy-50, 20, 20, $white);

	//���PNGͼƬ
	header('Content-type: image/png');
	imagepng($image);

	//����ͼ��
	imageDestroy($image);
?>
