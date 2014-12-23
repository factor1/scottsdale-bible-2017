<?php get_header(); ?>

<div class="page clearfix">
<div class="main_content clearfix">


<?php
foreach((get_the_category()) as $category) 
{ 
	if($category->cat_ID == 5 || $category->cat_ID == 100 || $category->cat_ID == 102)
	{
		$is_sermon = true;
		if($category->cat_ID == 102)
		{
			$posttags = get_the_tags();
			if ($posttags)
			{
				$count = 1;
				foreach($posttags as $tag)
				{
					if($tag->name == 'Sunday AM')
					{
						$is_main_sermon = true;
					}
				}
			}
		}
	}
}
?>
<?php
if($is_sermon)
{
?>
	<div class="sermoncolumn">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="sermon" id="post-<?php the_ID(); ?>">
	<!--<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link','%title',TRUE) ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;', '%title', TRUE) ?></div>
		</div>
		<div style="clear: both;"></div>-->
			<h1><?php the_title(); ?></h1>

			<div class="entry">
				<?php
				foreach(get_the_category() as $category) 
				{
					if($category->cat_ID == 5)
					{
						$posttags = get_the_tags();
						if ($posttags)
						{
							$count = 1;
							foreach($posttags as $tag)
							{
								if($tag->name == 'Sunday AM')
								{
									$is_main_sermon = true;
								}
							}
						}
					}
					if($category->category_parent == 5)
					{
						//$is_main_sermon = true;
						$series =  '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>';
						$this_post_category = $category->cat_ID;
						$this_post_id = $post->ID;
					}
					if($category->category_parent == 32)
					{
						$speaker =  $category->cat_name;
					}
					if($category->category_parent == 100)
					{
						$teaching =  $category->slug;
						//$is_main_sermon = false;
					}
				}
				
				$passage = get_post_meta($post->ID, 'passage', 'true');
				
				$video_asset_root = 'http://scottsdalebible.com/assets/sermons/video/';
				$video_asset_root2 = 'http://scottsdalebibledev.com/assets/sermons/video/';
				$audio_asset_root = 'http://scottsdalebible.com/assets/sermons/audio/';
				$audio_asset_reformed = 'http://scottsdalebible.com/assets/audio/reformed-living/';
				$audio_asset_essentials = 'http://scottsdalebible.com/assets/audio/christian-essentials/';
				$audio_asset_root2 = 'http://scottsdalebibledev.com/assets/sermons/audio/';
				
				$message_date = date('Ymd', strtotime($post->post_date));
				
				$posttags = get_the_tags();
				if ($posttags)
				{
					$count = 1;
					foreach($posttags as $tag)
					{
						$speaker = $tag->name;
						$message_speaker = substr($speaker, 0, 1) . substr($speaker, strpos($speaker, ' ', sizeof($speaker)) + 1);

						if(file_exists('./assets/sermons/video/' . $message_date . $message_speaker . '.mp4'))
						{
							$video_file = $video_asset_root . $message_date . $message_speaker . '.mp4';
						}						
						if(file_exists('./assets/sermons/video/videohd/' . $message_date . $message_speaker . '.mp4'))
						{
							$video_file_large = $video_asset_root . 'large/' . $message_date . $message_speaker . '.mp4';							
						}
						if(file_exists('./assets/sermons/audio/' . $message_date . $message_speaker . '.mp3'))
						{
							$audio_file = $audio_asset_root . $message_date . $message_speaker . '.mp3';	
						}
						$count++;
					}
					
						$results = array(array( ));
						foreach($posttags as $tag)
						{
							//echo $tag->slug . '<br />';
							foreach ($results as $combination)
							{
								array_push($results, array_merge(array($tag->slug), $combination));
							}
						}
						foreach($results as $combination)
						{
							if(sizeof($combination) == 2)
							{
								$message_speaker = strtoupper(substr($combination[1], 0, 1)) . ucwords(substr($combination[1], strpos($combination[1], '-', sizeof($combination[1])) + 1));
								if(file_exists('./assets/audio/' . $combination[0] . '/' . $message_date . $message_speaker . '.mp3'))
								{
									$audio_file = 'http://scottsdalebible.com/assets/audio/' . $combination[0] . '/' . $message_date . $message_speaker . '.mp3';				
									echo '<!-- audio file ' . $audio_file . '-->';
									break;
								}
								
								$message_speaker = strtoupper(substr($combination[0], 0, 1)) . ucwords(substr($combination[0], strpos($combination[0], '-', sizeof($combination[0])) + 1));
								
								if(file_exists('./assets/audio/' . $combination[1] . '/' . $message_date . $message_speaker . '.mp3'))
								{
									$audio_file = 'http://scottsdalebible.com/assets/audio/' . $combination[1] . '/' . $message_date . $message_speaker . '.mp3';				
									echo '<!-- audio file ' . $audio_file . '-->';
									break;
								}
							}
						}
				}	
				$audio_enclosure = get_post_meta($post->ID, 'enclosure', 'true');
				if($audio_enclosure)
				{
					$audio_enclosure = substr($audio_enclosure, 0, strpos($audio_enclosure, 'mp3')+3);
					echo '<!-- audio enclosure ' . $audio_enclosure . ' -->';
					$audio_file = $audio_enclosure;
				}
				
				if($video_file)
				{
				?>
				<div id="video_player">
				<script type="text/javascript" src="/flowplayer/flowplayer-3.2.6.min.js"></script>
				<script type="text/javascript" src="/flowplayer/flowplayer.ipad-3.2.2.js"></script>
				<a href="<?php echo $video_file; ?>"
			 style="display:block;width:480px;height:272px" id="player">
		</a> 
		<script>
		$f("player", "http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf").ipad();
		</script>
		
				</div>
				
				<!--<div id="video_player">
				<script src="/mediaplayer/swfobject.js" type="text/javascript"></script>
				<div id="player">
				<video src="<?php echo $video_file; ?>" controls="controls" width="470" height="320">
				</video>
				</div>
				<script type="text/javascript"><!--
				var so = new SWFObject('/mediaplayer/video_player.swf','mpl','470','320','9');
				so.addParam('allowscriptaccess','always');
				so.addParam('allowfullscreen','true');
				so.addParam('flashvars','&file=<?php echo $video_file; ?>&fullscreen=true');
				so.write('player');
				// -->
				<!--</script>
				</div>-->
				<?php 
				}
				else if($audio_file)
				{
				?>
				<script type="text/javascript" src="/player/audio-player.js"></script>  
        <script type="text/javascript">  
            AudioPlayer.setup("http://scottsdalebible.com/player/player.swf", {  
                width: 290  
            });  
        </script> 
         <p id="audioplayer_1"><audio controls="controls">
  						<source src="<?php echo $audio_file; ?>" type="audio/mp3" />
  						Your browser does not support the audio element.
					</audio></p>  
        <script type="text/javascript">  
        AudioPlayer.embed("audioplayer_1", {soundFile: "<?php echo $audio_file; ?>"});  
        </script>
				<?php		
				}
				else
				{
					echo 'file doesn\'t exist';
				}
				echo '<div>';
				echo '<h2>' . $speaker . '</h2>';
				echo '<h2>' . the_date('F j, Y') . '</h2>';
				echo '<h3>' . $passage . '</h3>';
				echo '<p>' . the_tags() . '</p>';
				if($series)
				{
					echo '<strong>Series: ' . $series . '</strong><br />';
				}
				
				$notes_test = './assets/notes/' . $message_date . 'Notes.pdf';
				$slides_test = './assets/slides/' . $message_date . 'Slides.ppt';
				$followup = get_post_meta($post->ID, 'followup_url', 'true');
				if($followup)
				{
					echo '<p><a href="' . $followup . '">Watch the sermon followup video</a></p>';
				}
				
				
				if(file_exists($notes_test))
				{
					$notes_link = trim($notes_test, '.');
				}
				if(file_exists($slides_test))
				{
					$slides_link = trim($slides_test, '.');
				}
				if($is_main_sermon && ($notes_link || $slides_link))
				{
					echo '<strong>Download: </strong>';
					if($notes_link)
					{
						echo '<a href="' . $notes_link . '" target="_blank">Notes</a>';
						if($slides_link)
						{
							echo ', ';
						}
					}
					if($slides_link)
					{
						echo '<a href="' . $slides_link . '" target="_blank">Slides</a>';
					}
				}
				?>
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
				
				
				<?php
				echo '</div>';
				?>
				
				

			</div>
			<hr />
			<!--<div>
					<p class="postmetadata alt">
						<small>
							This entry was posted
							<?php /* This is commented, because it requires a little adjusting sometimes.
								You'll need to download this plugin, and follow the instructions:
								http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
								/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
							on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
							and is filed under <?php the_category(', ') ?>.
							You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Both Comments and Pings are open ?>
								You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Only Pings are Open ?>
								Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Comments are open, Pings are not ?>
								You can skip to the end and leave a response. Pinging is currently not allowed.

							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Neither Comments, nor Pings are open ?>
								Both comments and pings are currently closed.

							<?php } edit_post_link('Edit this entry','','.'); ?>

						</small>
					</p>
				</div>-->
		</div>
		</div>
		<?php include(TEMPLATEPATH . '/right_col.php'); ?>
		
		
<div id="sermon_comments">
	<?php
	comments_template(); ?>
</div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>

	</div>
	<?php 
	}//end if sermon
	else
	{
	?>


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link','%title',TRUE) ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>-->
		<div style="clear: both;"></div>
		<div class="two_thirds_content" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<p class="postmetadata">Posted <?php the_time('F jS, Y') ?><br />In categories <?php the_category(', ') ?>, <?php the_tags( 'Tags: ', ', ', ''); ?> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			<div style="clear: both;"></div>
			<div id="sermon_comments">
	<?php
	comments_template(); ?>
</div>
		</div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
	<!-- right_col code -->
	<?php 
		if($_GET['test'] == 1)
		{ 
			include(TEMPLATEPATH . '/right_col_new.php'); 
		}
		else
		{
			include(TEMPLATEPATH . '/right_col.php'); 
		}
		?>
	<?php 
	}//end else
	?>
	
	
	
	
	
	</div>
	
	
	
	
	
	
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
