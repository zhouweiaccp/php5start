<?php
	$arr = array('apple', 'orange', 'pear');

	reset($arr);						//��������ָ���λ��
	while(list($index, $fruit) = each($arr)){
		echo "��" .$index. "��ˮ���ǣ�" .$fruit. "\n";
	}
?>
