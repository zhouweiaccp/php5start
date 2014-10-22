<?php
  if (array_key_exists ("num", $var_array)) 
  {
	echo $var_array[$key]
  }

  //isset()是更为常见的方法
  if (isset($var_array["num"])) 
  {
	echo $var_array[$key]
  }
?>
