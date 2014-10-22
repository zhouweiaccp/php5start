<?php
	/******************************************************/
	/*    ElementXml类，用于构建XML元素    */
	/******************************************************/
	class ElementXml
	{
		var $name;					//标签名称
		var $attributes;					//属性
		var $content;					//字符数据
		var $children;					//子ElementXml对象

		function setName($name){		//设定元素标签名
			$this->name = $name;
		}

		function setAttributes($attributes){	//设定元素标的属性
			$this->attributes = $attributes;
		}
		
		function setContent($content){		//设定元素的数据内容
			$this->content = $content;
		}
		
		function &getChildren(){			//取得子类
			return $this->children;
		}
	};
	
	/*********************************/
	/*    主函数xml2object    */
	/*********************************/
	function xml2object($xmldata) 
	{
		//创建解析器
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $xmldata, $xmltags);
		xml_parser_free($parser);

		//用于存放当前的ElementXml子类的数组
		$elements = array();
		//堆栈，为开始标签时入栈；结束标签时出栈
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

				if ($tag['type'] == "open") //push入栈
				{
					array_push($stacks, $elements);
					$elements = &$elements[$index]->getChildren();
				}
			}
			if ($tag['type'] == "close")  //pop出栈
			{
				$elements = &$stacks[count($stacks) - 1];
				array_pop($stacks);
			}
		}
		return $elements[0];				//返回根元素的值
	}

/** 测试用例 **/
$xmldata = '
<products>
   <category manufactory="China">中国制造</category>
   <item>
       <product>手工艺品</product>
       <product>服装鞋帽</product>
   </item>
</products>
';
echo "<pre>";
print_r(xml2object($xmldata));
echo "</pre>";
?>
