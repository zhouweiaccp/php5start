<?php
	$arr = array('apple', 'orange', 'pear');
	
	$i = 0;
	foreach($arr as $fruit){
		echo "��" .$i. "��ˮ���ǣ�" .$fruit. "\n";
		$i++;
	}
	//����
	foreach($arr as $index => $fruit)
		echo "��" .$index. "��ˮ���ǣ�" .$fruit. "\n";
?>
