<?php
/*
Template Name: children
*/

get_header("children"); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div id="head">
		<span class="cufon" style="font-size: 3em; color: #FFF;"><?php the_title(); ?></span>
	</div>
	
	<?php get_sidebar(); ?>
	
	<div id="content" class="narrowcolumn" role="main">
	
	<div id="postContainer">
		<div class="post childrens" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
	<div class="postFoot">
	<?php edit_post_link('edit'); ?>
	</div>
	</div>
	<?php endwhile; endif; ?>
	<?php //comments_template(); ?>
	
	</div>

<?php get_footer(); ?>
