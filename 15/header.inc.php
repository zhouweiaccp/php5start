<html>
<head>
<title>淘到我心@聊天室</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!—
/* 公共元素，字体大小 */
td,p,font,input{font-size:12px;}
body {background-color: #FFFFFF; font-color: #FFFFFF;}

/* 表格的样式 */
.main_table {background-position: center top;font-color: #FFFFFF;
	background-color: #339966; border: 0px solid #0000ff;
}
.cells {background-position: center top; font-color: #FFFFFF;border: 1px solid #0000ff; vertical-align: top;}
.current_listing {border: thin solid #999999;}
.row_title {font-weight: bold; color: #FFFFFF; background-color: #999999; text-align: left; vertical-align: top}

/* 列表行，双色相间之1 */
.row_1 {color: #000000; background-color: #EEEEEE; text-align: left; vertical-align: top}

/* 列表行，双色相间之2 */
.row_2 {color: #000000; background-color: #FFFFFF; text-align: left; vertical-align: top}

/* 信息框 */
.message { font-size: 15px; width: 95%; padding: 3px; color: #FF0000; text-align: left;
    background-color: #CECECE; border:1px solid #666666;
}

/* 超级链接 */
A:link, A:active {text-decoration:none;}
A:visited	{text-decoration: none;}
A:hover	{text-decoration: underline;}
-->
</style>
</head>

<script language=JavaScript>
  var popWin = "";

  //弹出新窗口
  function openwin(URL, strWidth, strHeight)
  {
if (popWin != ""){
		popWin.close();
}
    leftStr = (screen.width-strWidth)/2;
topStr = (screen.height-strHeight)/2;

windowProperties =	"toolbar=no,menubar=no,scrollbars=yes,statusbar=yes"
					+ ",height=" + strHeight
					+ ",width="+ strWidth
					+ ",left=" + leftStr
					+ ",top="+topStr+"";
    isDay = new Date();
    isID = isDay.getTime();
    popWin = window.open(URL,isID,windowProperties);
  }

  //确认对话框
  function confirmSubmit(text)
  {
  	var agree=confirm(text);
   	return agree ;
  }
// -->
</script>

<body bgcolor="FFFFFF" text="000000" link="333333" vlink="666666" alink="333333"
 topmargin="0" leftmargin="0" rightmargin="1" bottommargin="0">
