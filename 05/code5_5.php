<?php
  if (array_key_exists ("num", $var_array)) 
  {
	echo $var_array[$key]
  }

  //isset()�Ǹ�Ϊ�����ķ���
  if (isset($var_array["num"])) 
  {
	echo $var_array[$key]
  }
?>
