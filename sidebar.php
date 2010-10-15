		<div id="sidebar">
<?php

if ($post->post_parent)	{
	$ancestors=get_post_ancestors($post->ID);
	$root=count($ancestors)-1;
	$parent = $ancestors[$root];
} else {
	$parent = $post->ID;
}

$children = wp_list_pages("title_li=&child_of=". $parent ."&echo=0");

if ($children) { ?>
<div class="box">
<ul id="subnav">
<li class="ancestor">
<?php 
	$parent_title = get_the_title($post->post_parent);
	$permalink = get_permalink($post->post_parent); ?>
<a href="<?php echo $permalink; ?>"><?php echo $parent_title ?></a>
</li>

<?php echo $children; ?>
</ul>
</div>	
<?php } else {?>	

		
			<div class="box twitter">
				<div id="twitter_div">
				<h3 class="sidebar-title">Twitter Updates</h3>
				<ul id="twitter_update_list"></ul>
				<a href="http://twitter.com/rockviewchurch" id="twitter-link" style="display:block;text-align:right;">Follow us on Twitter!</a>
				</div>
				<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
				<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/rockviewchurch.json?callback=twitterCallback2&amp;count=3"></script>			
			</div>
			
			<?php } ?>
			
		</div>