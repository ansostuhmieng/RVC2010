<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<meta name="keywords" content="church,Kent,Rock,view,Rock View,rockview,Christian,Foursquare,four square,christianity,Church in kent,RVC,religion,faith,king county,seattle"> 
	<meta name="description" content="Rock View Church: Place your feet on solid ground!"> 	

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset/reset-min.css">
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<script type="text/javascript"> 
	var imgs = ["chrome01.jpg","chrome02.jpg","chrome05.jpg","chrome06.jpg"]
	var rand = Math.floor(Math.random()*3+1)
	onload=function() {
		//document.body.style.backgroundImage = "url('<?php bloginfo('template_url'); ?>/chrome/" + imgs[rand] +"')";
	}
 
	</script> 	
	
	
	<?php wp_head(); ?>
</head>
<body>
	<div id="headChrome"></div>
	<div id="bodyChrome"></div>
	<div id="widthContainer">
		
		<div id="navigation">
			<div id="navCenter" style="overflow:hidden;">
				<div style="height: 1.5em; margin-right: 1em; padding-top: 0.5em; float:right;">
					<a href="http://www.twitter.com/rockviewchurch"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-32x32.png" /></a>
					<a href="http://www.facebook.com/rockviewchurch"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-32x32.png" /></a>
					<a href="http://www.vimeo.com/rockviewchurch"><img src="<?php bloginfo('template_directory'); ?>/images/vimeo-32x32.png" /></a>
					<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/feed-32x32.png" /></a>
					<a href="http://itunes.apple.com/us/podcast/rock-view-church-podcast/id381715334"><img src="<?php bloginfo('template_directory'); ?>/images/itunes-32x32.png" /></a>
				</div>
				<a href="/wordpress/" id="logoBox" style="display:block;text-decoration:none;">&nbsp;</a>
			</div>
			<ul id="navBar">
				<?php wp_list_pages('depth=1&title_li=&exclude=4,2'); ?>
			</ul>	
		</div>

		<div id="head">
			<img src="<?php bloginfo('template_directory'); ?>/chrome/sendoff2.png" />
		</div>