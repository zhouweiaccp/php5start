<?php
	//��ͼ��
	$im = imageCreateFromPNG('dave.png');

	if ($im && imageFilter($im, IMG_FILTER_GRAYSCALE)) 
	{
    		echo '�Ҷȴ���ɹ���';
	    imagePNG($im, 'dave.png');
	} else {
    		echo '�Ҷȴ���ʧ�ܣ�';
	}

	//�����ڴ�ͼ��
	imageDestroy($im);
?>
