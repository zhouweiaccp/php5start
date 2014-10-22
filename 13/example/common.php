<?php
  /**********************************/
  /*  �ļ�����common.php	*/
  /*  ���ܣ������ļ�		*/
  /**********************************/

  //ÿҳ��ʾ�ļ�¼����
  define( 'EACH_PAGE', 40);

  //����ADODB�ļ�
  require_once('../adodb/adodb.inc.php');

  //����Access���ݿ�
  $database = 'SoftwareLib.mdb';
  $database = realpath($database);
  $dsn = "Driver={Microsoft Access Driver (*.mdb)};Dbq={$database};Uid=Admin;Pwd=;";

  //����ACCESS���ݿ�
  $db =& ADONewConnection('access');

  //���÷��ؼ�¼��ģʽ
  $db->setFetchMode (ADODB_FETCH_ASSOC);
  $db->PConnect ($dsn);
  $db->debug=0;

  //���URL��ַ
  function url ($url, $text='', $attr='', $target='_self')
  {
	if(empty($text))
		$text = $url;
	return '<a href="' .$url. '" target="' .$target. '"' .$attr. '>' .$text. '</a>';
  }

  //��ʽ���ַ���,��HTMLת��Ϊ��ȫ��ҳ������
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
