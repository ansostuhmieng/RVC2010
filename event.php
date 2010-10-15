<?php
/*
Template Name: event
*/

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="head">
		<span class="cufon" style="font-size: 3em; color: #FFF;"><?php the_title(); ?></span>
	</div>

	<div id="content" class="widecolumn" role="main">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="event">
				
				
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
			</div>
			<!-- social bookmark thingy goes here -->
		</div>

<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
	<div class="postFoot">&nbsp;</div>

<?php get_footer(); ?>
