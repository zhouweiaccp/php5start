<?php
	//ָ����ͼ��
	$filename = 'photo.png';

	//���ͼ��ĳߴ�
	list($width, $height) = getImageSize($filename);

	//��ͼ��Ĵ�С
	$new_width = $width * 0.5;
	$new_height = $height * 0.5;

	//��������ͼ
	$image_d = imageCreateTrueColor ($new_width, $new_height);
	$image_s = imageCreatefromPNG ($filename);
	imageCopyResampled ($image_d, $image_s, 0, 0, 0, 0,
						$new_width, $new_height, $width, $height);

	//���JPEGͼ��
	header ('Content-type: image/jpeg');
	imageJPEG($image_d, null, 99);			//ʵ��99%ѹ��
?>
