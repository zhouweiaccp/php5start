<?php
	/******************************************************/
	/*    ElementXml�࣬���ڹ���XMLԪ��    */
	/******************************************************/
	class ElementXml
	{
		var $name;					//��ǩ����
		var $attributes;					//����
		var $content;					//�ַ�����
		var $children;					//��ElementXml����

		function setName($name){		//�趨Ԫ�ر�ǩ��
			$this->name = $name;
		}

		function setAttributes($attributes){	//�趨Ԫ�ر������
			$this->attributes = $attributes;
		}
		
		function setContent($content){		//�趨Ԫ�ص���������
			$this->content = $content;
		}
		
		function &getChildren(){			//ȡ������
			return $this->children;
		}
	};
	
	/*********************************/
	/*    ������xml2object    */
	/*********************************/
	function xml2object($xmldata) 
	{
		//����������
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $xmldata, $xmltags);
		xml_parser_free($parser);

		//���ڴ�ŵ�ǰ��ElementXml���������
		$elements = array();
		//��ջ��Ϊ��ʼ��ǩʱ��ջ��������ǩʱ��ջ
		$stacks = array();
		foreach ($xmltags as $tag)
		{
			$index = count($elements);
			if ($tag['type'] == "complete" || $tag['type'] == "open") 
			{
				$elements[$index] = new ElementXml;
				$elements[$index]->setName ($tag['tag']);
				$elements[$index]->setAttributes ($tag['attributes']);
				$elements[$index]->setContent ($tag['value']);

				if ($tag['type'] == "open") //push��ջ
				{
					array_push($stacks, $elements);
					$elements = &$elements[$index]->getChildren();
				}
			}
			if ($tag['type'] == "close")  //pop��ջ
			{
				$elements = &$stacks[count($stacks) - 1];
				array_pop($stacks);
			}
		}
		return $elements[0];				//���ظ�Ԫ�ص�ֵ
	}

/** �������� **/
$xmldata = '
<products>
   <category manufactory="China">�й�����</category>
   <item>
       <product>�ֹ���Ʒ</product>
       <product>��װЬñ</product>
   </item>
</products>
';
echo "<pre>";
print_r(xml2object($xmldata));
echo "</pre>";
?>
