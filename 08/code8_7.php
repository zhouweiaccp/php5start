<?php
	header("Content-type: image/jpeg");
	$img = imageCreateTrueColor(300, 35);

	//ָ����ɫ
	$white = imageColorAllocate ($img, 255, 255, 255);
	$grey = imageColorAllocate ($img, 100, 100, 100);
	$black = imageColorAllocate ($img, 0, 0, 0);
	imageFilledRectangle ($img, 0, 0, imagesX($img)-1, imagesY($img)-1, $white);

	$text = "�������壬Hello PHP��";
	$font = "simsun.ttc";		 	//ָ�����壬�硰���塱

	//���һ����Ӱ
	imageTtfText ($img, 20, 0, 12, 27, $grey, $font, $text);

	//���һ�����壬����Ӱ֮��
	imageTtfText ($img, 20, 0, 10, 25, $black, $font, $text);

	imageJPEG ($img);
	imageDestroy ($img);
?>
