<?php
	$data = "<root><line /><content language=\"gb2312\">简单的XML数据</content></root>";
	$parser = xml_parser_create();						//创建解析器
	xml_parse_into_struct($parser, $data, $values, $index);	//解析到数组
	xml_parser_free($parser);							//释放资源
	
	//显示数组结构
	echo "\n索引数组\n";
	print_r($index);
	echo "\n数据数组\n";
	print_r($values);
?>
