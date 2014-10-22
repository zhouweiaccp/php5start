<?php
	//创建XML解析器
	$xml_parser = xml_parser_create();

	//使用大小写折叠来保证能在元素数组中找到这些元素名称
	xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, true);

	//读取XML文件
	$xmlfile = "data.xml";
	if (!($fp = fopen($xmlfile, "r")))
	{
	    die("无法读取XML文件$xmlfile");
	}

	//解析XML文件
	$has_error = false;			//标志位
	while ($data = fread($fp, 4096))
	{
		//循环地读入XML文档，只到文档的EOF，同时停止解析
		if (!xml_parse($xml_parser, $data, feof($fp)))
		{
			$has_error = true;
			break;
		}
	}

	if($has_error)
	{ 
		echo "该XML文档是错误的！<br />";

		//输出错误行，列及其错误信息
		$error_line   = xml_get_current_line_number($xml_parser);
		$error_row   = xml_get_current_column_number($xml_parser);
		$error_string = xml_error_string(xml_get_error_code($xml_parser));

		$message = sprintf("［第%d行，%d列］：%s", 
						$error_line,
						$error_row,
						$error_string);
		echo $message;
	}
	else
	{
		echo "该XML文档是结构良好的。";
	}
	
	//关闭XML解析器指针，释放资源
	xml_parser_free($xml_parser);
?>
