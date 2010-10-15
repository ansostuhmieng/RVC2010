<?php
/*
Template Name: start
*/

get_header("start"); 
				global $more;    // Declare global $more (before the loop).
				
?>

<div id="head">
	<span class="cufon" style="font-size: 1.5em; color: #FFF;">Place your feet on <br /><span style="font-size: 1.7em; position:relative; top:-0.1em; left: 1em;">Solid Ground</span></span>
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
					<!--Address: Box 564, Disneyland<br />-->
					Phone: 253-234-5782
				</address>
				<a href="find-us" style="text-decoration:none;">
					<div class="cufonWhite" style="background-color: #000; color:#FFF; margin-top: 2.3em; font-size: 5em; padding: 0.25em;opacity:0.8; filter:alpha(opacity=80;);">come visit us!</div>
				</a>
			<?php 
				global $post;
				$args= array(
					'post__in'  => get_option('sticky_posts'),
					'post_type'=>'post',
					'category_name' => 'series',
					'numberposts' => '1'	
				);
				
				$myposts = get_posts($args);
				foreach($myposts as $post) :
					setup_postdata($post);
			?>
			
			<dt>Current Series</dt>
			<a href="<?php the_permalink() ?>" style="text-decoration:none;" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
			<dd style="background-image: url(<?php  echo get('SliderBackground'); ?>);">
				<div class="cufon" style="font-size: 5em; color: #FFF; padding: 1em;"><?php echo get('SliderText'); ?></div>
			</dd>
			</a>
			<?php endforeach; wp_reset_query(); ?>
			
			<?php 
				$args= array(
					'post__in'  => get_option('sticky_posts'),
					'post_type'=>'post',
					'category_name' => 'special-event',
					'numberposts' => '1'		
				);
			
				$myposts = get_posts($args);
				foreach($myposts as $post) :
					setup_postdata($post);

				$slideBackground = get('slide-image');
				$slideText = get('slide-text');
			?>
			
			<dt>Upcoming Events</dt>
			
			<dd class="upcomingSlide" style="background-image: url(<?php  echo $slideBackground; ?>);">
				<?php if(dbem_are_events_available()) {?>
				<ul class="upcomingEvents">
					<li class="heading"><a href="<?php dbem_rss_link(true); ?>">Other Events <img style="float:right;padding: 2px;" src="<?php bloginfo('template_url'); ?>/images/33.png"></a></li>
					<?php dbem_get_events_list("limit=5&scope=al&order=ASC&format=<li><a href=\"#_EVENTPAGEURL\"><span class=\"#_CATEGORY\">#_{m/d/Y}</span> #_NAME</a></li>"); ?> 
				</ul>
				<?php }?>
				<a href="<?php the_permalink() ?>" style="text-decoration:none; display:block; width:100%; height: 100%;" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<div class="cufon" style="font-size: 5em; color: #FFF; padding: 1em;">
					<?php echo $slideText; ?>
				</div>
				</a>
			</dd>
			
			<?php endforeach; ?>
			<dt>Fall Event</dt>
			<a href="http://www.rockviewchurch.com/halloween-outreach">
				<dd style="background-image: url(<?php bloginfo('template_url'); ?>/haloween2010/slider-template.jpg);background-repeat:no-repeat;"></dd>		
			</a>
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
				$args= array(
					'post_type'=>'post',
					'category_name' => 'pastors-blog',
					'numberposts' => '1'					//'numberposts=1'
				);
				
				//$recentPosts->query($args);
			

			
				$myposts = get_posts($args);
				foreach($myposts as $post) :
					setup_postdata($post);
					$more = 0;       // Set (inside the loop) to display content above the more tag.
			?>
			
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<span class="postDate"><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></span>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<div class="entry">
						<?php the_content("Continue reading " . the_title('', '', false)); ?>
					</div>
			</div>
				<div class="postFoot"> <?php edit_post_link('edit', '', ' | '); ?>  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
			<?php endforeach; ?>

		</div>
		
		
		
	</div>



<?php get_footer(); ?>
