<?php
	/* ����һ������ */
	$my_books = array(	
				"english" => "English Book", 
				"math" => "Math Book",
				"other" => "Other Book"
				);
	echo $my_books["english"];
	echo $my_books[other];		//���淶��д���������Other Book

	define("other", "math");		//����otherΪ��math��
	echo $my_books[other];		//���Math Book
	echo $my_books["other"];		//���Other Book
?>
