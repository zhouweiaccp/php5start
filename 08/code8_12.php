<?php
	//ԭʼͼ��
	$src_img = imageCreateFromPNG("big.png");

	//����ͼ��
	$dst_img = imageCreateTrueColor(200, 200);

	//����ͼ��
	imageCopy ($dst_img, $src_img, 0, 0, 50, 50, 200, 200);

	//���ɼ��к��ͼ��
	imagePNG($dst_img, "small.png");

	//�����ڴ��е�ͼ��
	imageDestroy($dst_img);
	imageDestroy($src_img);
?>
