<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Andrew Mods
 */

get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" role="main">
		<div id="postContainer">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<span class="postDate"><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></span>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry">
					<?php the_content("Continue reading " . the_title('', '', false)); ?>
				</div>
				<span class="signature">-<?php the_author() ?></span>
			</div>
			<div class="postFoot"> <?php edit_post_link('edit', '', ' | '); ?>  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>

		<?php endwhile; ?>

		<div class="navigationNextPrevious">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
	</div>
	</div>



<?php get_footer(); ?>
