<?php
	//����һ���ļ�������
	$files = array (
	  array("name"=>"pic.gif", "size"=>"1.2M"),		//1,258,291�ֽ�
	  array("name"=>"pic1.gif", "size"=>"500K"),		//512,000�ֽ�
	  array("name"=>"pic2.gif", "size"=>"0.97M"),		//1,017,118�ֽ�
	  array("name"=>"pic10.gif", "size"=>123400),		//123,400�ֽ�
	  array("name"=>"pic12.gif", "size"=>"123456b")	//123,456�ֽ�
	);

	//�Զ��ļ��ߴ�ȽϺ���
	function cmpare_filesize($a, $b){
		$sizeA = cal_filesize($a["size"]);
		$sizeB = cal_filesize($b["size"]);
		return $sizeA - $sizeB;
	}
	
	//��һ�����ָ�ʽ�ĳߴ���ת��Ϊ�ֽ�ֵ
	//�硰2k����2048�ֽ�
	function cal_filesize($size){
		$signal = strtoupper(substr($size, -1));
		switch($signal){
			case 'M':
				$size = (float)$size * 1024 *1024; break;
			case 'K':
				$size = (float)$size * 1024; break;
			case 'B':
			default:
				$size = (float)$size;
		}
		return intval($size);			//Ϊ�˱��ڱȽϣ���������
	}

	//�Զ��巽�����򣬰����ļ��ߴ���С����
	usort ($files, "cmpare_filesize");
	
	//����ȽϵĽ��
	echo "Name &nbsp;  Size<br>-------------------<br>";
	foreach($files as $file){
		echo $file["name"] ." ". $file["size"] . "<br>\n";
	}
?>
