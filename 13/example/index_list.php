<?php
require_once 'common.php';

define( 'EACH_PAGE', 40);

		$page = $_GET['page'];
		$page =  ($page) ? $page : 1;
		$offset = EACH_PAGE*($page -1);
?>
<p><h2>����б�</h2></p>
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

	 	echo "��<b>" .$rs->MaxRecordCount(). "</b>����¼\n";

		if ($rs->AtFirstPage()){
			echo '[��ҳ] [��һҳ]';
		}else{
			echo '[', url('?page=' .($current_page+1), '��ҳ'), '] [',
				 url('?page=' .($current_page-1), '��һҳ', 'l'), ']';
		}

		echo "\n";

		if ($rs->AtLastPage()){
			echo '[��һҳ] [βҳ]';
		}else{
			echo '[', url('?page=' .($current_page+1), '��һҳ', 'r'),
				 '] [', url('?page=' .$last_page, 'βҳ'), ']';
		}
	 	echo "\n<font color=red>{$current_page}</font>/{$last_page}ҳ \n";

		echo 'ת�� <input type="text" id="page" value="'.$current_page.'" size="2" maxlength="3"> ';
		
?>
	<input type="button" value="GO" onClick="location.href='?page='+document.getElementById('page').value">
	</div></p>
