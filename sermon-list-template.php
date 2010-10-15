<?php
/*
Template Name: sermon-list
*/

get_header();
$series = '';
?>
	<div id="content" class="widecolumn" role="main">

	<?php 
	  query_posts('category_name=sermon&posts_per_page=5');
		while (have_posts()) : the_post(); 
	?>
	<div class="post">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
			<a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
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
	<div class="postFoot">&nbsp;</div>
		<?php endwhile; ?>
	
	<div class="navigationNextPrevious">
		<?php next_posts_link('&laquo; Older Entries') ?>
		<?php previous_posts_link('Newer Entries &raquo;') ?>
	</div>


<?php get_footer(); ?>
