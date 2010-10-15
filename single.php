<?php
$post = $wp_query->post;
if ( in_category('sermon') ) {
include(TEMPLATEPATH . '/single-sermon.php');
}
else if (in_category('series') )
{
include(TEMPLATEPATH . '/single-series.php');
} 
else if (in_category('special-event') )
{
include(TEMPLATEPATH . '/single-special-event.php');
} 
else 
{
include(TEMPLATEPATH . '/single-default.php');
}
?>