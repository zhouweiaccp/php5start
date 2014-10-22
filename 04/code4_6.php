<?php
	$this_year = 2006;
	$text = <<< EOT
祝无双,F,1982,广东,普通职员
李大嘴,M,1981,河北,普通职员
佟湘玉,F,1980,山西,项目经理
EOT;
	$lines = explode("\n", $text);				//将多行数据分开
	foreach($lines as $userinfo)
	{
		$info = explode(",", $userinfo, 3);		//仅分割前三个数据
		$name = $info[0];
		$sex = ($info[1] == "F") ? "女" : "男";
		$age = $this_year - $info[2];

		echo "姓名：$name $sex 年龄：$age<br>";		//输出
	}

/* 输出结果是
	姓名：祝无双 女 年龄：24
	姓名：李大嘴 男 年龄：25
	姓名：佟湘玉 女 年龄：26
*/
?>
