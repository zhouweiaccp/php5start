<?php
	//��ͼ��
	$im = imageCreateFromPNG('sean.png');

	if ($im && imageFilter($im, IMG_FILTER_GAUSSIAN_BLUR)) 
	{
	    echo '���ȸı�ɹ���';
	    imagePNG($im, 'sean.png');
	}else{
	    echo '���ȸı�ʧ�ܣ�';
	}

	//�����ڴ�ͼ��
	imageDestroy($im);
?>
