<?php
	//��ʼԪ�ش�����
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

	//����Ԫ�ش�����
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

	//�ַ����ݴ�����
	function character_data($parser, $data) 
	{
	    echo $data;
	}

	//ָ�����
	function pi_handler($parser, $target, $data) 
	{
	    if (strtolower($target)== "php")
	    {
			eval($data);
	    } else {
	         printf("����ָ��: <i>%s</i>", 
			         htmlspecialchars($data));
	    }
	}

	//�ⲿʵ�崦����
	function external_entity($parser, $openEntityNames, $base, $systemId,
	                                  $publicId) {
	    if ($systemId)
	    {
		   //��ÿ���ⲿʵ�崴��XML������
		   if (!list($parser, $fp) = new_xml_parser($systemId)) 
		   {
	            printf("��%s���޷���ʵ�塰%s��\n",
	            	$systemId,
	            	$openEntityNames
	            );
	            return false;
	        }

		   //��ȡXML�ļ�������ʵ�����
	        while ($data = fread($fp, 4096))
		   {
	            if (!xml_parse($parser, $data, feof($fp))) 
			  {
	                printf("����ʵ��%sʱ���ڵ�%d�з���XML����%s\n",
		                	$openEntityNames,
	                       xml_get_current_line_number($parser),
	                       xml_error_string(xml_get_error_code($parser))
	                 );
	                xml_parser_free($parser);
	                return false;
	            }
	        }
		   
	        //�ͷ�XML��������Դ
	        xml_parser_free($parser);
	        return true;
	    }
	    return false;
	}

	//������XML�ļ���������Ҫ�������ⲿʵ���ļ�
	function new_xml_parser($file) 
	{
	    global $parser_file;

	    //����XML������
	    $xml_parser = xml_parser_create();

	    //���ò���
	    xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, 1);

	    //����Ԫ�ش�����
	    xml_set_element_handler($xml_parser, "start_element", "end_element");

	    //�����ַ�������
	    xml_set_character_data_handler($xml_parser, "character_data");

	    //����ָ�����
	    xml_set_processing_instruction_handler($xml_parser, "pi_handler");

	    //�����ⲿʵ�崦����
	    xml_set_external_entity_ref_handler($xml_parser, "external_entity");
	    
	    //��XML�ļ�ʧ��
	    if (!($fp = @fopen($file, "r"))) 
	    {
	        return false;
	    }
	    if (!is_array($parser_file))
	    {
	        $parser_file = array($parser_file);
	    }
	    $parser_file[$xml_parser] = $file;

	    //����$xml_parser������
	    return array($xml_parser, $fp);
	}
?>

<html>
<head><title>�����ⲿ����ʵ�� - TaoDoor.com</title>
</head>
<body>

<?php
	//��ʼ�����ⲿʵ��
	$file = "main.xml";
	if (!(list($xml_parser, $fp) = new_xml_parser($file))) {
	    die("�޷���XML�������룡");
	}

	//��ȡXML�ļ����ݣ������н���
	while ($data = fread($fp, 4096)) 
	{
	    if (!xml_parse($xml_parser, $data, feof($fp)))
		{
	        //���������Ϣ
		   die(sprintf("��%s�ĵ�%d�г���XML����%s\n",
	        		$file,
				xml_get_current_line_number($xml_parser),
				xml_error_string(xml_get_error_code($xml_parser)))
	        );
	    }
	}

	//�ͷ�XML��Դ
	xml_parser_free($xml_parser);
?>
</body>
</html>
