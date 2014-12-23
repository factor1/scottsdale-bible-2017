<?php /* Template Name: Home */ ?>

<?php get_header(); ?>



<div id="container" class="new">
	<div id="section1" class="container_padding">	</div><!--section1-->

	
	<div id="section3" class="container_padding">
		<div id="slider">		
			<?php echo get_f1slider(1); ?>
		</div>
		
		<div id="events">
			<h2>UPCOMING EVENTS</h2>
			<p class="registrations"><a href="/registration">VIEW ALL REGISTRATIONS</a></p>
			<ul>
	<?php
	global $post;
	$myposts = get_posts('numberposts=-1&meta_key=front_page&meta_value=true');
	$sorted_array = array();
	foreach($myposts as $post)
	{
		$sort_by_time = get_post_meta($post->ID, 'sort_by_time', 'true');
		$sorted_array[$sort_by_time] = $post;
	}
	$count = 0;
	$first = ' class="first"';
	ksort($sorted_array);
	//echo '<!-- time: ' . date('r', time()). ' -->';
	foreach($sorted_array as $post)
	{
		$removal_time = get_post_meta($post->ID, 'removal_time', 'true');
		$display_date = get_post_meta($post->ID, 'featured_event_date', 'true');
		$alternate_url = get_post_meta($post->ID, 'alternate_url', 'true');
		if($removal_time > time() && $count < 6)
		{
			if($alternate_url)
			{
				echo '<li' . $first . '><span class="date">' . $display_date . '</span><a href="' . $alternate_url . '">' . $post->post_title . '</a><br />' . $post->post_excerpt . '</li>';
			}
			else
			{
				echo '<li><p><a href="/upcoming-events/' . $post->post_name . '">' . $post->post_title . '</a></p><p class="font-blue">' . $display_date . '</p></li>';
			}
			if($first == ' class="first"'){$first = '';}
			$count++;
		}
	}
	 ?>
	 </ul>
		</div>
	</div><!--section3-->
	<div id="section4" class="container_padding">
		<div id="slot1">
			<a href="<?php echo of_get_option('home_slot1_url'); ?>"><img src="<?php echo of_get_option('home_slot1_img'); ?>" /></a>
		</div>
		<div id="slot2">
			<a href="<?php echo of_get_option('home_slot2_url'); ?>"><img src="<?php echo of_get_option('home_slot2_img'); ?>" /></a>
		</div>
		<div id="slot3">
			<a href="<?php echo of_get_option('home_slot3_url'); ?>">
				<img src="<?php echo of_get_option('home_slot3_img'); ?>" />
				<img src="<?php bloginfo('template_url'); ?>/images/latest_message.jpg" />
				<img id="button_play" src="<?php bloginfo('template_url'); ?>/images/play.png" />
			</a>
		</div>
	</div><!--section4-->



<?php get_footer(); ?>
