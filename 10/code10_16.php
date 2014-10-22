<?php
	//开始元素处理函数
	function start_element($parser, $name, $attribs) 
	{
	    switch($name){
	    	case 'TITLE':
	    		echo '<h2>';
	    	break;
	    	case 'SECTION':
	    		if($attribs["NOTE"]=='link')
	    			$color="#FFCC00";
	    		elseif($attribs["NOTE"]=='article')
	    			$color="#FFCCFF";
	    		else
	    			$color="#AACC00";
				echo '<div style="background-color:'.$color.'">';
	    	break;
	    	case 'INFORMALTABLE':
	    		echo '<table border="1">';
	    	break;
	    	case 'ENTRY':
		    	echo '<td>';
	    		if(isset($attribs["ID"])){
		    		echo '<a href="?#id='.$attribs["ID"].'">';
		    	}else{
		    		echo '<b>';
		    	}
	    	break;
	    	case 'ROW':
	    		echo '<tr>';
	    	break;
	    }
	}

	//结束元素处理函数
	function end_element($parser, $name) 
	{
	    switch($name){
			case 'TITLE' :
				echo '</h2>';
			break;
	    	case 'SECTION':
	    		echo '</div>';
	    	break;
			case 'INFORMALTABLE':
				echo '</table>';
			break;
			case 'ENTRY':
				if(isset($attribs["ID"])){
					echo '</a>';
				}else{
					echo '</b>';
				}
				echo '</td>';
			break;
			case 'ROW':
				echo '</tr>';
			break;
	    }
	    echo "\n";
	}

	//字符数据处理函数
	function character_data($parser, $data) 
	{
	    echo $data;
	}

	//指令处理函数
	function pi_handler($parser, $target, $data) 
	{
	    if (strtolower($target)== "php")
	    {
			eval($data);
	    } else {
	         printf("处理指令: <i>%s</i>", 
			         htmlspecialchars($data));
	    }
	}

	//外部实体处理函数
	function external_entity($parser, $openEntityNames, $base, $systemId,
	                                  $publicId) {
	    if ($systemId)
	    {
		   //对每个外部实体创建XML解析器
		   if (!list($parser, $fp) = new_xml_parser($systemId)) 
		   {
	            printf("在%s，无法打开实体“%s”\n",
	            	$systemId,
	            	$openEntityNames
	            );
	            return false;
	        }

		   //读取XML文件，进行实体解析
	        while ($data = fread($fp, 4096))
		   {
	            if (!xml_parse($parser, $data, feof($fp))) 
			  {
	                printf("解析实体%s时，在第%d行发生XML错误：%s\n",
		                	$openEntityNames,
	                       xml_get_current_line_number($parser),
	                       xml_error_string(xml_get_error_code($parser))
	                 );
	                xml_parser_free($parser);
	                return false;
	            }
	        }
		   
	        //释放XML解析器资源
	        xml_parser_free($parser);
	        return true;
	    }
	    return false;
	}

	//解析主XML文件，返回需要解析的外部实体文件
	function new_xml_parser($file) 
	{
	    global $parser_file;

	    //创建XML解析器
	    $xml_parser = xml_parser_create();

	    //设置参数
	    xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, 1);

	    //设置元素处理函数
	    xml_set_element_handler($xml_parser, "start_element", "end_element");

	    //设置字符处理函数
	    xml_set_character_data_handler($xml_parser, "character_data");

	    //设置指令处理函数
	    xml_set_processing_instruction_handler($xml_parser, "pi_handler");

	    //设置外部实体处理函数
	    xml_set_external_entity_ref_handler($xml_parser, "external_entity");
	    
	    //打开XML文件失败
	    if (!($fp = @fopen($file, "r"))) 
	    {
	        return false;
	    }
	    if (!is_array($parser_file))
	    {
	        $parser_file = array($parser_file);
	    }
	    $parser_file[$xml_parser] = $file;

	    //返回$xml_parser解析器
	    return array($xml_parser, $fp);
	}
?>

<html>
<head><title>处理外部引用实体 - TaoDoor.com</title>
</head>
<body>

<?php
	//开始解析外部实体
	$file = "main.xml";
	if (!(list($xml_parser, $fp) = new_xml_parser($file))) {
	    die("无法打开XML数据输入！");
	}

	//读取XML文件内容，并进行解析
	while ($data = fread($fp, 4096)) 
	{
	    if (!xml_parse($xml_parser, $data, feof($fp)))
		{
	        //输出错误信息
		   die(sprintf("在%s的第%d行出现XML错误：%s\n",
	        		$file,
				xml_get_current_line_number($xml_parser),
				xml_error_string(xml_get_error_code($xml_parser)))
	        );
	    }
	}

	//释放XML资源
	xml_parser_free($xml_parser);
?>
</body>
</html>
