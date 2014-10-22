<?php
	function cal_circle_area($radius) {
		$area = M_PI * ($radius * $radius);		//计算圆的面积，M_PI是π的常量
		return $area;
	}
	
	$the_radius = 5;
	$the_area = cal_circle_area($the_radius);
	echo "半径为 {$the_radius} 的圆的面积是 {$the_area}。";
?>
