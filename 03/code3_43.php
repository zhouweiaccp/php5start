<?php
	$lines = array(						//����һ������
		"���������������",
		"һ�а��������졣",
		"��������ǧ��ѩ��",
		"�Ų��������ﴬ��",
	);

	for($i=0; $i<count($lines); $i++){
		if($i%2==0)					//ʹ��ȡ��ķ����������������ɫ
			$color="red";
		else
			$color="green";
		echo '<font color="' .$color. '">' .$lines[$i]. '</font>';
		echo "<br>\n";
	}
?>
