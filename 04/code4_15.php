<?php
	$arr = array(
		"photo1.jpg", "photo2.jpg", "photo10.jpg", "photo12.jpg",
	);

	$max_str = $arr[0];
	for($i=1; $i< count($arr); $i++)
	{
		if(strnatcmp($arr[$i], $max_str)>0)
		{
			$max_str = $arr[$i];
		}
	}

	echo $max_str;		//Êä³ö¡°photo12.jpg¡±
?>
