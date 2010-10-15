<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="head">
		<span class="cufon" style="font-size: 3em; color: #FFF;"><?php the_title(); ?></span>
	</div>

	<div id="content" class="widecolumn" role="main">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<!--
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>-->
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php   do_action('addthis_widget', get_permalink(), "");   ?>
				<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
				
				<span class="signature">-<?php the_author() ?></span>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			<!-- social bookmark thingy goes here -->
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
