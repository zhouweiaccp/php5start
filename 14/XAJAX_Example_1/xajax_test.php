<?php
//����XAJAX���
require_once("../xajax/xajax.inc.php");

//ʵ����XAJAX����:
$xajax = new xajax();

//ע������Ҫͨ��XAJAX���õ�PHP����������
$xajax->registerFunction("showOutput");

//��дע���PHP�����������ں���֮��ʹ��xajaxResponse���󷵻�XMLָ��

function showOutput()
{
	//�������ݣ�����ֻ��ʾ���Ե�
	//ʵ�ʿ����Ǵ����ݿ���ȡ�õ�
	$testResponseOutput ="<b>Hello, XAJAX World!</b>";

	//ʵ����xajaxResponse����
	$objResponse = new xajaxResponse();

	//���ָ���Ӧ֮�У�����ָ��
	//ָ��Ԫ��(����id="submittedDiv")��innerHTML���Ե��µ�����
	$objResponse->addAssign("submittedDiv", "innerHTML", $testResponseOutput);

	//���ش�����xajaxResponse����
	return $objResponse;
}

//�ڽű�����κ���Ϣ֮ǰ������XAJAX�ӹ�����
$xajax->processRequests();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>XAJAX���Գ���</title>
<?php 
	//�����������JavaScript���룬ͨ����<head>��ǩ֮��
	$xajax->printJavascript("../xajax/");
?>
</head>
<body>

<h2>XAJAX���Գ���</h2>

<form id="testForm1" onsubmit="return false;">

<!--�ڳ����У���JavaScript�¼�����ǰ��ע��ĺ���-->
<p><input type="submit" value="��ʾ������Ӧ" onclick="xajax_showOutput(); return false;" /></p>
</form>

<div id="submittedDiv"></div>

</body>
</html>
