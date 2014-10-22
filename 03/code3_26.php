<?php
	/* 定义一个数组 */
	$my_books = array(	
				"english" => "English Book", 
				"math" => "Math Book",
				"other" => "Other Book"
				);
	echo $my_books["english"];
	echo $my_books[other];		//不规范的写法，但输出Other Book

	define("other", "math");		//定义other为“math”
	echo $my_books[other];		//输出Math Book
	echo $my_books["other"];		//输出Other Book
?>
