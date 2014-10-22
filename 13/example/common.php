<?php
  /**********************************/
  /*  文件名：common.php	*/
  /*  功能：公共文件		*/
  /**********************************/

  //每页显示的记录行数
  define( 'EACH_PAGE', 40);

  //包含ADODB文件
  require_once('../adodb/adodb.inc.php');

  //连接Access数据库
  $database = 'SoftwareLib.mdb';
  $database = realpath($database);
  $dsn = "Driver={Microsoft Access Driver (*.mdb)};Dbq={$database};Uid=Admin;Pwd=;";

  //连接ACCESS数据库
  $db =& ADONewConnection('access');

  //设置返回记录的模式
  $db->setFetchMode (ADODB_FETCH_ASSOC);
  $db->PConnect ($dsn);
  $db->debug=0;

  //输出URL地址
  function url ($url, $text='', $attr='', $target='_self')
  {
	if(empty($text))
		$text = $url;
	return '<a href="' .$url. '" target="' .$target. '"' .$attr. '>' .$text. '</a>';
  }

  //格式化字符串,将HTML转换为安全的页面文字
  function h ($html)
  {
	if(isset($html)){
		$html = str_replace ('  ', '&nbsp; ', $html);
		return htmlspecialchars ($html);
	}else{
		return '';
	}
 }
?>
