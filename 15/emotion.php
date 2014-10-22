<?php
  /**************************************/
  /*		文件名：emotion.php			*/
  /*		功能：查看表情图片页面		*/
  /**************************************/

  include "config.inc.php";		//包含配置信息
  include "header.inc.php";		//包含公用头部页面

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <strong>表情</strong> - <a href="userlist.php">返回</a>
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <?php
	$i = 0;

	//循环遍历数组
	foreach($smilies as $icon => $image)
	{
		//处理行的颜色
		if($bgrow == 1){
			$bgcolor = "row_1";
			$bgrow = 0;
		}else{
			$bgcolor = "row_2";
			$bgrow = 1;
		}
  ?>
	  <tr class="<?php echo $bgcolor ?>">
	    <td><strong><?php echo $icon ?></strong></td>
	    <td><?php echo $image ?></td>
	  </tr>
  <?php
	}
  ?>
	</table>
    </td>
  </tr>
</table>

</body>
</html>
