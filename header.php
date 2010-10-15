<?php
if (is_page('start')){
	include(TEMPLATEPATH.'/header-start.php'); 
}
else if (is_404()){
	include(TEMPLATEPATH.'/header-start.php'); 
}
else {
	 include(TEMPLATEPATH.'/header-slim.php'); 
}
?>