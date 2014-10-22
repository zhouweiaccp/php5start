<?php
	/* 校验电话号码 */
	function checkTelno($tel)
	{
		//去掉多余的分隔符
		$tel = ereg_replace("[\(\)\. -]", "", $tel);
	
		//仅包含数字，至少应为一个6位的电话号（即没有区号）
		if(ereg("^\d+$", $tel))
		{
			return true;
		}else{
			return false;
		}
	}
	
	$rs = checkTelno("(086)-0411-12345678");			//返回真
?>
