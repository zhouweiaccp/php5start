<?php
	include("config.inc.php");
	include(ROOT."lib/db.php");
	include("functions.inc.php");
	if($_GET["city"]) {
		list($cookie_city_id,	$cookie_city_name) = explode("|",base64_decode($_GET["city"]));
		setCity($cookie_city_id,$cookie_city_name);
	}else {
		list($cookie_city_id,$cookie_city_name) = getCity();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<style type="text/css">
    body {
	margin:10;
	padding:0;
	font: 12px/1.5em Verdana;
}

input,select {
	font: 12px Verdana;
}

h2 {
	font: bold 14px Verdana, Arial, Helvetica, sans-serif;
	color: #000;
	margin: 0px;
	padding: 0px 0px 0px 15px;
}
/*- Menu Tabs B--------------------------- */

    #tabsB {
      float:left;
      width:100%;
      background:#F4F4F4;
      font-size:93%;
      line-height:normal;
      }
    #tabsB ul {
	margin:0;
	padding:10px 10px 0 50px;
	list-style:none;
      }
    #tabsB li {
      display:inline;
      margin:0;
      padding:0;
      }
    #tabsB a {
      float:left;
      background:url("tableftB.gif") no-repeat left top;
      margin:0;
      padding:0 0 0 4px;
      text-decoration:none;
      }
    #tabsB a span {
      float:left;
      display:block;
      background:url("tabrightB.gif") no-repeat right top;
      padding:5px 15px 4px 6px;
      color:#666;
      }
    /* Commented Backslash Hack hides rule from IE5-Mac \*/
    #tabsB a span {float:none;}
    /* End IE5-Mac hack */
    #tabsB a:hover span {
      color:#000;
      }
    #tabsB a:hover {
      background-position:0% -42px;
      }
    #tabsB a:hover span {
      background-position:100% -42px;
      }
      /*------------- contents ------------*/
  #contents {width:565px; float:left; border:1px #F4F4F4 solid; padding-bottom:10px;}
  .message_content ul {width:100px;float:left;padding-left:13px;}
  .message_content li {padding:0; font-size:12px; line-height:19px;}
  .message_content {clear:both;padding-left:10px;}
  .message_content span{color:#999999; font-size:12px;}
  ul{margin:0;padding:0;list-style-type:none}
  .box_mobi_left_info{ position:relative; margin-bottom:46px !important;margin-bottom:23px; margin-top:23px; width:100%;}
  .info_title{ float:left; font-size:14px;  position:relative;}
  .info_img{ float:left; padding-left:5px;}
  .info_time{ float:left;padding-left:20px; color:#5B5A5A;}
  .info_Content{ clear:both; height:22px; line-height:22px; overflow:hidden; width:85%; float:left; position:relative;}
  .text_gray {color:#666666;}
  .text_14 {font-size:14px;}
.left_info_box1 {height:23px; line-height:23px; margin-left:10px;background-color:#F4F4F4; width:96%; margin-left:0px; padding-left:10px;margin-top:10px !important;margin-top:20px; font-size:14px;}
.left_info_box2_static{width:100%;padding-left:10px;padding-top:8px !important;padding-top:0px;}
.left_info_box2_top { margin-top:8px; margin-left:10px;height:8px !important;height:22px;}
</style>
</head>
<body>
<h2>分类信息</h2>
<div id="tabsB" style="	font: bold 12px Verdana;">
<div style="top:5px;right:10px;position:absolute;">
<form action="index.php" method="get">
	<select name="city">
<?php
		$conn = getDBConnect();
		$Sql = "select * from city where parent_id=0 order by id";
		$Rs = $conn->Execute($Sql);
		$selectFlg = "";
		while($row = $Rs->FetchRow()) {
			if($row["id"] == $cookie_city_id) {
				$selectFlg = "selected";
			}else {
				$selectFlg = "";
			}
			echo "<option value='".base64_encode($row["id"]."|".$row["city_name"])."' {$selectFlg} >".$row["city_name"]."</option>";
		}
?>
	</select>
	<input type="submit" value="提交" />
</form>
</div>
  <ul>
    <li><a href="index.php" title="首页"><span>首页</span></a></li>
    <li><a href="post.php" title="免费发布"><span>免费发布</span></a></li>
  </ul>
</div>