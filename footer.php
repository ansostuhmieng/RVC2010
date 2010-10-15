		<div id="foot">
			<table style="width: 100%;">
				<tr>
					<td valign="top" style="border-right: 1px solid #EEE; width: 33%; padding: 1em;">
						<ul id="footNav">
							<?php wp_list_pages('depth=1&title_li='); ?>
						</ul>
					</td>
					<td valign="top" style="border-right: 1px solid #EEE;  width: 34%; padding: 1em;">
						<div id="contact">
							<address>
								Rock View Church<br />
								<a href="mailto:office@rockviewchurch.com">office@rockviewchurch.com</a><br />
								Address: P.O. Box 1341 Kent WA, 98035<br />
								Phone: 253-234-5782
							</address>
						</div>
					</td>
					<td valign="top" style="width: 33%; padding: 1em;">
						<a href="http://www.twitter.com/rockviewchurch"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-32x32.png" /></a>
						<a href="http://www.facebook.com/rockviewchurch"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-32x32.png" /></a>
						<a href="http://www.vimeo.com/rockviewchurch"><img src="<?php bloginfo('template_directory'); ?>/images/vimeo-32x32.png" /></a>
						<a href="http://feeds.feedburner.com/RockViewChurch"><img src="<?php bloginfo('template_directory'); ?>/images/feed-32x32.png" /></a>
						<a href="http://feeds.feedburner.com/RockViewChurchPodcast"><img src="<?php bloginfo('template_directory'); ?>/images/itunes-32x32.png" /></a>
					</td>
				</tr>
			</table>
		</div>
		<div id="foot2"><a href="<?php echo get_admin_url(); ?>" title="Login">admin</a> &copy;2010 Rock View Church</div>
	</div>
	<div class="footChrome"></div>
	<?php wp_footer(); ?>
</body>
</html>