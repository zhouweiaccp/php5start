<?php
	//����ͼƬ
	$filename = 'photo.png';
	$image = imageCreateFromPNG($filename);

	//��ת60�ȣ�û�и��ǵ��ĵط�ʹ�ð�ɫ
	$rotate = imageRotate($image, 60, imageColorAllocate($image, 255, 255, 255));

	//���ͼ��
	header('Content-type: image/jpeg');
	imageJPEG($rotate);

 	imageDestroy($rotate);
 	imageDestroy($image); 
?>
