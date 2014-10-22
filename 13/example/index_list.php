<?php
require_once 'common.php';

define( 'EACH_PAGE', 40);

		$page = $_GET['page'];
		$page =  ($page) ? $page : 1;
		$offset = EACH_PAGE*($page -1);
?>
<p><h2>软件列表</h2></p>
<p>
<ol start="<?php echo $offset+1; ?>">
<?php
		$rs = $db->PageExecute("SELECT id, softName, postDate FROM SoftwareLib ORDER BY id DESC", EACH_PAGE, $page);
		while($o = $rs->fetchNextObject()){
			list($postdate, $posttime) = split(' ', $o->POSTDATE);
			$id = $o->ID;
			$softname = $o->SOFTNAME;
			echo ' <li>[<font size="-2">',$postdate ,'</font>]',
				 url("index_show.php?id=".$id, $softname), '</li>', "\n";
		}
?>
</ol>
</p>
<p>
	<div>
<?php
	 	$current_page = $rs->AbsolutePage();
	 	$last_page = $rs->LastPageNo();

	 	echo "共<b>" .$rs->MaxRecordCount(). "</b>条记录\n";

		if ($rs->AtFirstPage()){
			echo '[首页] [上一页]';
		}else{
			echo '[', url('?page=' .($current_page+1), '首页'), '] [',
				 url('?page=' .($current_page-1), '上一页', 'l'), ']';
		}

		echo "\n";

		if ($rs->AtLastPage()){
			echo '[下一页] [尾页]';
		}else{
			echo '[', url('?page=' .($current_page+1), '下一页', 'r'),
				 '] [', url('?page=' .$last_page, '尾页'), ']';
		}
	 	echo "\n<font color=red>{$current_page}</font>/{$last_page}页 \n";

		echo '转到 <input type="text" id="page" value="'.$current_page.'" size="2" maxlength="3"> ';
		
?>
	<input type="button" value="GO" onClick="location.href='?page='+document.getElementById('page').value">
	</div></p>
