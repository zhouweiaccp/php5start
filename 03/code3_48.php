<?php
	function cal_circle_area($radius) {
		$area = M_PI * ($radius * $radius);		//����Բ�������M_PI�Ǧеĳ���
		return $area;
	}
	
	$the_radius = 5;
	$the_area = cal_circle_area($the_radius);
	echo "�뾶Ϊ {$the_radius} ��Բ������� {$the_area}��";
?>
