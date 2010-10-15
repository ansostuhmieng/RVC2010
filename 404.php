<?php
/*
Template Name: start
*/

get_header(); ?>

<div id="head">
	<span class="cufon" style="font-size: 2em; color: #FFF;">Sorry we didn't find<br /><span style="font-size: 1.7em; position:relative; top:-0.1em; left: 0.5em;">what you were looking for.</span></span>
</div>

<div class="slideDeckBox">
	<div id="slidedeck_frame">
		<dl class="slidedeck">
			<dt>Welcome</dt>
			<dd class="videoSlide">
				<object width="533" height="300"><param name="wmode" value="transparent"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=11820924&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed wmode="transparent" src="http://vimeo.com/moogaloop.swf?clip_id=11820924&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="533" height="300"></embed></object>
			</dd>
			<dt>Find Us</dt>
			<dd class="findusSlide">
				<address>
					Rock View Church<br />
					<a href="mailto:office@rockviewchurch.com">office@rockviewchurch.com</a><br />
					Address: Box 564, Disneyland<br />
					Phone: +12 34 56 78
				</address>
				<div class="cufonWhite" style="background-color: #000; color:#FFF; margin-top: 2.3em; font-size: 5em; padding: 0.25em;opacity:0.8; filter:alpha(opacity=80;);">come visit us!</div>
			
			</dd>
			<dt>Current Series</dt>
			<dd class="currentSeries">
				<div class="cufon" style="font-size: 5em; color: #FFF; padding: 1em;">On the Precipice of Life</div>
			</dd>
			<dt>Upcoming Events</dt>
			<dd class="upcomingSlide">
				<div class="cufon" style="font-size: 5em; color: #FFF; padding: 1em;">
					Kent Cornicopia Days!
				</div>
			</dd>
		</dl>
	</div>
	
	<script type="text/javascript">
		$('.slidedeck').slidedeck();
	</script>
</div>

<?php get_sidebar(); ?>

	<div id="content" role="main">
		<div id="postContainer">

			<?php 
				$recentPosts = new WP_Query();
				$recentPosts->query('showposts=1');
			
				while ($recentPosts->have_posts()) : $recentPosts->the_post(); 
			?>
			
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<span class="postDate"><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></span>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<div class="entry">
						<?php the_excerpt('Read the rest of this entry &raquo;'); ?>
					</div>
				</div>
				<div class="postFoot"> <?php edit_post_link('edit', '', ' | '); ?>  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
			<?php endwhile; ?>

		</div>
	</div>



<?php get_footer(); ?>
