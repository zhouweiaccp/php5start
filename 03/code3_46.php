<?php
	$arr = array ('one', 'two', 'three', 'four', 'five', 'six');

	while (list ($index, $value) = each ($arr)) {
		if (!($index % 2)) {	 			//��������Ϊ����ֵ��Ԫ��
        		continue;
		}
		echo $value;					//�����ǰԪ��
	}
?>
