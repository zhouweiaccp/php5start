<?php
	//���ܣ���һ��ͼƬ�ļ�
	//���룺ͼƬ�ļ���
	//�����ͼƬ
	function LoadGif($imgname)
	{
		//���Դ�GIFͼ��
		$img = @imageCreateFromGIF($imgname); 

		if(!$img)		 //�����ʧ��
		{ 
			//�������ļ�
			$img = imageCreateTrueColor(200, 50); 
			$bgc = imageColorAllocate($img, 255, 255, 255);
			$stc = imageColorAllocate($img, 0, 0, 0);

			//������
			imageFilledRectangle($img, 0, 0, 200, 50, $bgc);

			//���������Ϣ
			imageString($img, 1, 5, 5, "Error loading $imgname", $stc);
		}
		return $img;
	}

	//���Է���
	$img = LoadGif("photo.gif");						//�����ļ�
	$img = LoadGif("http://taodoor.com/photo.gif");			//Զ���ļ�
?>
