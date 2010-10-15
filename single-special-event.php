<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header("sermon");



?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
	$startdate = get('start-date');
	$enddate = get('end-date');
	$starttime = get('start-time');
	$endtime = get('end-time');
	$locationName = get('location-name');
	$locationImage = get('location-image');
	$locationAddress = get('address');
	
	$blurb = get('blurb');
	
	if($locationImage == '')
					$locationImage = get_bloginfo('template_directory') . "/images/envelope.jpg";		
?>

	<div id="head">
		<span class="cufon" style="font-size: 3em; color: #FFF;"><?php the_title(); ?></span>
	</div>
	
	<div id="content" class="widecolumn" role="main">
		<div class="sermonBox">
			<div class="dataBox">
				<ul>
					<li>Starts on <u><?php echo $startdate; ?></u> at <u><?php echo $starttime; ?></u></li>
					<?php if ($enddate != '') {?>
					<li>Ends on <u><?php echo $enddate; ?></u>
						<?php if ($endtime != '') {?>
							at <u><?php echo $endtime; ?></u>
						<?php } ?>
					</li>					
					<?php } ?>
					
				</ul>
				<?php if ($blurb != '') {?>
				<ul>
					<li><?php echo $blurb; ?></li>
				</ul>
				<?php } ?>
			</div>
			<div class="postcardBox" style="background-image: url(<?php echo $locationImage; ?>);">
				<img src="<?php echo get_bloginfo('template_directory'); ?>/images/rockviewstamp.png" style="float:right; padding: 1em;"/>
				<?php if($locationAddress != '') { ?>
				<div style=" margin:auto; width: 200px; padding-top:20%;">
					<div class="postcardAddress">
						<?php echo $locationAddress; ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	
	
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<span class="signature">-<?php the_author() ?></span>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>
	
	</div>
<?php endif; ?>

<?php get_footer(); ?>
