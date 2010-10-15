<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header("sermon");
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="head">
		<span class="cufon" style="font-size: 3em; color: #FFF;"><?php the_title(); ?></span>
	</div>
	
	<div id="content" class="widecolumn" role="main">
		<div class="sermonBox">
			<div class="dataBox">
				<?php
				$audio = get('audio');
				$powerpoint = get('powerpoint');
				$teachers = get_field_duplicate('teacher');
				$date = get('DateTaught');
				
				if($audio != '')
				{
				?>
				<?php if (function_exists("insert_audio_player")) {  
				  insert_audio_player("[audio:". $audio . "]");  
				} ?>
				
				<a class="downloadLink" href="<?php echo $audio; ?>">Download Audio</a>
				
				<?php } 
				
				if($powerpoint != '')
				{ ?>
					<a class="downloadLink" href="<?php echo $powerpoint; ?>">Download PowerPoint</a>
				<?php
				}
				echo '<ul>';
				if($teachers != '')
				{
					
					echo '<li class="heading">Teachers</li>';
			
					foreach($teachers as $teacher)
					{
						echo '<li>' . $teacher . "</li>";
					}
					
					if($date != '')
					{
						echo '<li class="taughtOn">'.$date.'</li>';
					}		
				}
				else
				{
					echo '<li>"But the meek ones themselves will possess the earth, And they will indeed find their exquisite delight in the abundance of peace."</li>';
				}
				echo '</ul>';
				

				?>
				<a class="downloadLink" href="http://www.rockviewchurch.com/category/sermon/feed/">Subscribe (RSS)</a>
				<a class="downloadLink" href="http://itunes.apple.com/us/podcast/rock-view-church-podcast/id381715334">Subscribe (iTunes)</a>
				
			</div>

			<?php 
				$image = get('TitleImage');
			
				if($image == '')
					$image = get_bloginfo('template_directory') . "/chrome/tilewood.jpg";	
			?>
			
			<div class="videoBox" style="background-image: url(<?php echo $image; ?>);">
				<?php 
					$video = get('video');
					if($video != '')
					{
				?>
					<object width="100%" height="300"><param name="wmode" value="transparent"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $video; ?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed wmode="transparent" src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $video; ?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="100%" height="300"></embed></object>
				<?php
					}
				?>
			</div>

		</div>
	
	
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<!--
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>-->

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<span class="signature">-<?php the_author() ?></span>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<div style="display:none;">
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						This entry was posted
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry','','.'); ?>

					</small>
				</p>
				</div>
			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>
	
	</div>
<?php endif; ?>

<?php get_footer(); ?>
