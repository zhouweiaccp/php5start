<?php
	if(rename ("oldname.gif", "newname.gif")){
		echo "文件重命名成功！";
	}else{
		echo "文件重命名失败！";
	}
?>
