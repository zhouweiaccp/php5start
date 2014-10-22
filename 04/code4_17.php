<?php
	echo similar_text("Heilbronn", "Hilbert");		//Êä³ö5
	echo similar_text("guest", "ghost", $similar);	//Êä³ö3
	echo $similar . "%";						//Êä³ö60%
?>
