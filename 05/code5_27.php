<?php
	$files = array ("pic1.gif", "pic10.gif", "pic2.gif", "pic12.gif", "pic.gif");

	function cmp_file($a, $b){
		return strnatcmp($a, $b);	//“自然排序”法比较字符串
	}
	
	usort ($files, "cmp_file");		//自定义方法排序
	echo "<p>自定义排序：";
	echo join(", ", $files);
	//输出结果为“自定义排序：pic.gif, pic1.gif, pic2.gif, pic10.gif, pic12.gif”
?>
