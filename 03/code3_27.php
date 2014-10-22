<?php
	//检查常量
	if(defined("M_EULER"))
	{
		define("M_EULER", 0.5772156649015);
	}

	//检查变量
	if(isset($_GET["page"]))
	{
		$_GET["page"] = 1;
	}
	
?>
