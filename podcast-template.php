<?php
/*
Template Name: sermon-podcast
*/
?>
<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"; ?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
<channel>
	<title>Rock View Church Podcast</title>
	<link>http://www.rockviewchurch.com/podcast</link>
	<language>en-us</language>
	<copyright>&#x2117; &amp; &#xA9; 2010 Rock View Church</copyright>
	<itunes:subtitle>Come Grow with Us!</itunes:subtitle>
	<itunes:author>Rock View Church</itunes:author>
	<itunes:summary>A collection of growth inspiring messages from Rock View Church.</itunes:summary>
	<description>A collection of growth inspiring messages from Rock View Church.</description>
	<itunes:owner>
		<itunes:name>Rock View Church</itunes:name>
		<itunes:email>office@rockviewchurch.com</itunes:email>
	</itunes:owner>
	<itunes:image href="http://example.com/podcasts/everything/AllAboutEverything.jpg" />
	<itunes:category text="Religion &amp; Spirituality">
		<itunes:category text="Christianity"/>
	</itunes:category>
	<?php 
	function yoast_rss_date( $timestamp = null ) {
	  $timestamp = ($timestamp==null) ? time() : $timestamp;
	  echo date(DATE_RSS, $timestamp);
	}
	
	function remote_file_size ($url){ 
		$head = ""; 
		$url_p = parse_url($url); 
		$host = $url_p["host"]; 
		if(!preg_match("/[0-9]*\.[0-9]*\.[0-9]*\.[0-9]*/",$host)){
			// a domain name was given, not an IP
			$ip=gethostbyname($host);
			if(!preg_match("/[0-9]*\.[0-9]*\.[0-9]*\.[0-9]*/",$ip)){
				//domain could not be resolved
				return -1;
			}
		}
		$port = intval($url_p["port"]); 
		if(!$port) $port=80;
		$path = $url_p["path"]; 
		//echo "Getting " . $host . ":" . $port . $path . " ...";

		$fp = fsockopen($host, $port, $errno, $errstr, 20); 
		if(!$fp) { 
			return false; 
			} else { 
			fputs($fp, "HEAD "  . $url  . " HTTP/1.1\r\n"); 
			fputs($fp, "HOST: " . $host . "\r\n"); 
			fputs($fp, "User-Agent: http://www.example.com/my_application\r\n");
			fputs($fp, "Connection: close\r\n\r\n"); 
			$headers = ""; 
			while (!feof($fp)) { 
				$headers .= fgets ($fp, 128); 
				} 
			} 
		fclose ($fp); 
		//echo $errno .": " . $errstr . "<br />";
		$return = -2; 
		$arr_headers = explode("\n", $headers); 
		// echo "HTTP headers for <a href='" . $url . "'>..." . substr($url,strlen($url)-20). "</a>:";
		// echo "<div class='http_headers'>";
		foreach($arr_headers as $header) { 
			// if (trim($header)) echo trim($header) . "<br />";
			$s1 = "HTTP/1.1"; 
			$s2 = "Content-Length: "; 
			$s3 = "Location: "; 
			if(substr(strtolower ($header), 0, strlen($s1)) == strtolower($s1)) $status = substr($header, strlen($s1)); 
			if(substr(strtolower ($header), 0, strlen($s2)) == strtolower($s2)) $size   = substr($header, strlen($s2));  
			if(substr(strtolower ($header), 0, strlen($s3)) == strtolower($s3)) $newurl = substr($header, strlen($s3));  
			} 
		// echo "</div>";
		if(intval($size) > 0) {
			$return=intval($size);
		} else {
			$return=$status;
		}
		// echo intval($status) .": [" . $newurl . "]<br />";
		if (intval($status)==302 && strlen($newurl) > 0) {
			// 302 redirect: get HTTP HEAD of new URL
			$return=remote_file_size($newurl);
		}
		return $return; 
	} 	
	
	$recentPosts = new WP_Query();
	$args= array(
		'post_type'=>'post',
		'category_name' => 'sermon',
		'showposts=7'
	);

	$recentPosts->query($args);

	while ($recentPosts->have_posts()) : $recentPosts->the_post(); 
	
		$audio = get('audio');
		$teachers = get_field_duplicate('teacher');
		$date = get('DateTaught');
		
		if($teachers != "")
			$teach = implode(", ", $teachers);
			
		if($audio == "")
			continue;
	?>
	<item>
		<title><?php the_title_rss() ?></title>
		<itunes:author><?php echo $teach; ?></itunes:author>
		<itunes:subtitle>Taught on <?php echo $date; ?></itunes:subtitle>
		<itunes:summary><?php the_content_rss( "read more..."); ?></itunes:summary>
		<enclosure url="<?php echo $audio; ?>" type="audio/mpeg" length="<?php echo remote_file_size( $audio ); ?>" />
		<guid><?php echo $audio; ?></guid>
		<pubDate><?php yoast_rss_date(strtotime($ps[$lastpost]->post_date_gmt)); ?></pubDate>
		<itunes:keywords>christian, teaching, growth</itunes:keywords>
	</item>
	<?php endwhile; ?>
</channel>
</rss>