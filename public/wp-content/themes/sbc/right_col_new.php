<?php
include(TEMPLATEPATH . '/ministry_contacts.php');

$ministry_array_keys = array_keys($ministry_contacts);

$ministry_page_post_cats = array(
	'73'=>array('10', 'Children\'s', 'scottsdalebible.com_6egrmrs8ppj3kp2cdn2g20u780@group.calendar.google.com'),
	'198'=>array('50', 'Women\'s', 'scottsdalebible.com_5humftj8q044k1urvf3or2jpk0@group.calendar.google.com'),
	'182'=>array('51', 'Special Ministries', 'scottsdalebible.com_r5fkscdbl4c97prto6ov26hqis@group.calendar.google.com'),
	'180'=>array('99', 'Counseling', 'scottsdalebible.com_qmifqjd4a6m8q0qu33a6arptbk@group.calendar.google.com'),
	'2335'=>array('58', 'Financial Ministry'),
	'53'=>array('59', 'Marriage Ministry', 'scottsdalebible.com_a4uq8hpk6n0dfde95lv30hcrqk@group.calendar.google.com'),
	'186'=>array('60', 'Men\'s Ministry', 'scottsdalebible.com_dcgf6s9m6alrllnjvjbpsrj3vc@group.calendar.google.com'),
	'1712'=>array('62', 'Faith Forward'),
	'149'=>array('65', 'ACCESS', 'scottsdalebible.com_qirqebbvgfdceqi0pln32slh44@group.calendar.google.com'),
	'2707'=>array('67', 'IMPACT'),
	'2996'=>array('69', 'Club 56'),
	'192'=>array('70', 'Second Half', 'scottsdalebible.com_bhp5rvu2811pm4s406cnu6vbi0@group.calendar.google.com'),
	'1746'=>array('78', 'Reformed Living'),
	'1720'=>array('64', 'Christian Essentials'),
	'196'=>array('115', 'Student Ministries', 'scottsdalebible.com_lcl9a1knpjrli8umhurfoht1gc@group.calendar.google.com'),
	'190'=>array('12', 'Outreach', 'scottsdalebible.com_6fc1mmehlccm33ahrjfvnhrfgk@group.calendar.google.com')
	);

if(is_page() || is_single())
{
	if(is_single())
	{
		foreach((get_the_category()) as $category) 
		{ 
			if($category->category_parent == 5)
			{
				$do_nothing = true;
			}
		}
	}

	if($do_nothing != true)
	{
if(sizeof($post->ancestors) > 1)
{
	$event_post_category = $post->ancestors[sizeof($post->ancestors) - 2];
	if(!$ministry_page_post_cats[$event_post_category])
	{
		$event_post_category = $post->ancestors[0];
	}
	if(!$ministry_page_post_cats[$event_post_category])
	{
		$event_post_category = $post->ID;
	}
	
}
else
{
	$event_post_category = $post->ID;
}
	$events_title = 'All Church Events';
	if($ministry_page_post_cats[$event_post_category])
	{
		$myposts = get_posts('numberposts=-1&category=' . $ministry_page_post_cats[$event_post_category][0]);
		
		//make sure that the events we found are in the future
		foreach($myposts as $post1)
		{
			$sort_by_time = get_post_meta($post1->ID, 'sort_by_time', 'true');
			$sorted_array[$sort_by_time] = $post1;
		}
		if($sorted_array)
		{
			ksort($sorted_array);
		
			$count = 0;
			foreach($sorted_array as $post2)
			{
				$removal_time = get_post_meta($post2->ID, 'removal_time', 'true');
				if($removal_time > time())
				{
					$use_these_events = true;
				}
			}
		}
		if($use_these_events == true)
		{
			$events_title = $ministry_page_post_cats[$event_post_category][1] . ' Events';
		}
		else
		{
			$myposts = null;
		}
	}
	
	if(!$myposts)
	{
		$myposts = get_posts('numberposts=-1&meta_key=front_page&meta_value=true');
	}
	$sorted_array = array();
	
	echo '<div class="right_col">';

		$gcal_address = $ministry_page_post_cats[$event_post_category][2];

			echo '
			<div class="front_box right_col_box">';
			echo '<h2>Categories</h2>';
			echo '<ul>';
				  wp_list_categories();
			echo '</ul>';
		echo '</div>';
		
		
		if($gcal_address && $_GET['cal'])
		{
		echo '
			<div class="front_box right_col_box">';
			echo '<h2>' . $events_title . '</h2>';
			echo '<ul>';
			include('./wordpress/wp-content/themes/sbc/gcal.php');
			echo '</ul>';
		echo '</div>';
		}
		else
		{

			echo '
				<div class="front_box right_col_box">
				';
			echo '<h2>' . $events_title . '</h2>';
			echo '<ul>';

			 foreach($myposts as $post1)
			 {
				$sort_by_time = get_post_meta($post1->ID, 'sort_by_time', 'true');
				$sorted_array[$sort_by_time] = $post1;
			 }
			ksort($sorted_array);
			$count = 0;
			foreach($sorted_array as $post2)
			{
				$removal_time = get_post_meta($post2->ID, 'removal_time', 'true');
				$display_date = get_post_meta($post2->ID, 'featured_event_date', 'true');
				if($removal_time > time() && $count < 5)
				{
				echo '<li>
					<a href="/upcoming-events/' .  $post2->post_name . '">' . $post2->post_title . '</a><br />
					' . $display_date . '
					<br />' . $post2->post_excerpt . '</li>';
					$count++;
				}
			}
			 echo '</ul>';
				echo '</div>';
		}
		
		$parent_post = get_post($post->ancestors[0]);
		$parent_post_name = $parent_post->post_name;
		if($ministry_page_post_cats[$event_post_category][0] > 0 && ($ministry_page_post_cats[$event_post_category][0] == 78 || $ministry_page_post_cats[$event_post_category][0] == 64))
		{
			$postslist = get_posts('numberposts=10&orderby=date&category=' . $ministry_page_post_cats[$event_post_category][0] . '');
		}
		
		if($postslist)
		{
			echo'<div class="front_box right_col_box">
			<h2>Audio Messages</h2>';
		
			if($postslist != null)
			{
				echo "<ul>";
				foreach ($postslist as $post1) :
				echo "<li>";
				if($post1->ID != $this_post_id)
				{					
					list($date, $time) = explode(' ', $post1->post_date);
					list($year, $month, $day) = explode('-', $date);
					list($hour, $minute, $second) = explode(':', $time);

					$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
					echo '<a href="/sermons/';
					echo $post1->post_name;
					echo '">';
					echo $post1->post_title;
					echo '</a>';
					echo '<br />';
				}
				echo "</li>";
			 endforeach;
				echo "</ul>";
			}
		
			echo '</div>';
		}
		
		foreach($ministry_array_keys as $ministry_array_key)
		{
			$found_in_array = false;
			if($post->ancestors)
			{
				if(in_array($ministry_array_key, $post->ancestors))
				{
					$found_in_array = true;
				}
			}
			if($found_in_array || $ministry_array_key == $post->ID)
			{
				echo'
				<div class="front_box right_col_box">
					<h2>Ministry Contacts</h2>';
				foreach($ministry_contacts[$ministry_array_key] as $ministry_contact)
				{
					echo'
					<p style="padding: 5px;"><strong>' . $ministry_contact['name'] . '</strong><br />';
					if($ministry_contact['title'])
					{
						echo $ministry_contact['title'] . '<br />';
					}
					if($ministry_contact['phone'])
					{
						echo $ministry_contact['phone'] . '<br />';
					}
					echo '<a href="mailto:' . $ministry_contact['email'] . '">' . $ministry_contact['email'] . '</a></p>
					';
				}
				echo '</div>';
			}
		}
		echo '<div class="front_box right_col_box">
			
					<h2>Other Links</h2>
					<ul>';
					wp_list_pages('title_li=0&depth=0&include=65,174,1033');
				echo '
					</ul>
				</div>';
		
		
		echo '</div>';
					}
}
if(is_single())
{
	foreach((get_the_category()) as $category) 
	{ 
		if($category->category_parent == 5)
		{
			echo '<div class="right_col">
			<div class="right_col_box front_box">
				<h2>Messages in this Series</h2>';
				$postslist = get_posts('numberposts=-1&orderby=date&category='.$this_post_category.'');
				echo '<h3>' . $series . '</h3>';
					if($postslist != null)
					{
						echo "<ul>";
						foreach ($postslist as $post1) :
						echo "<li>";
						if($post1->ID != $this_post_id)
						{
							echo '<a href="';
							echo $post1->post_name;
							echo '">';
							echo $post1->post_title;
							echo '</a>';
						}
						else
						{
							echo '<strong>' . $post1->post_title . '</strong>';
						}
						echo "</li>";
					 endforeach;
						echo "</ul>";
					}
			echo'</div>
			<div class="right_col_box front_box subscribe">
				<h2>Download this sermon</h2>
				<ul>';
					if($audio_file)
					{
						echo '<li><a href="' . $audio_file . '">Audio MP3</a></li>';
					}
					if($video_file)
					{
						echo '<li><a href="' . $video_file . '">Low-res video</a></li>';
					}
					if($video_file_large)
					{
						echo '<li><a href="' . $video_file_large . '">High-res video</a></li>';
					}
					echo '
				</ul>
			</div>
			<div class="right_col_box front_box subscribe">
				<h2>Subscribe to our Podcast</h2>
				<a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824509"><img src="/wordpress/wp-content/themes/sbc/images/podcast_logo_sized.jpg" class="rss" /> Subscribe with iTunes!</a>
				Automatically download video messages on Sunday!
				<div style="clear:both;"></div>
				<p>Or <a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824809">subscribe</a> to just the audio!</p>
			</div>
			<div class="right_col_box front_box subscribe">
				<h2>Complete Teaching Archive</h2>
				Looking for the old audio archive? <a href="http://sermons.scottsdalebible.com/">Find it here!</a>
			</div>
		</div>';
		}
	}
}
if(is_category())
{
	$current_category = single_cat_title("", false);
	//if($current_category == 'Sermons')
	//{
		echo '
		<div class="right_col">
			<div class="right_col_box front_box subscribe">
				<h2>All Series</h2>
				<ul>';
				wp_list_categories('title_li=&orderby=name&child_of=5');
				$series_id_array;
				$series_array = array();
				foreach($series_id_array as $series_id)
				{
					//echo $series_id . '<br />';
					$series_posts = get_posts('category=' . $series_id . '&orderby=date&numberposts=1');
					array_push($series_array, $series_posts[0]);
				}
				//echo '<pre>' . print_r($series_array) . '</pre>';
				rsort($series_array);
				foreach($series_array as $series_post)
				{
					//echo $series_post->post_title . '<br />';
				}
				echo'</ul>
			</div>
			<div class="right_col_box front_box subscribe">
				<h2>Subscribe to our Podcast</h2>
				<a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824509"><img src="/wordpress/wp-content/themes/sbc/images/podcast_logo_sized.jpg" class="rss" /> Subscribe with iTunes!</a>
				Automatically download video messages on Sunday!
				<div style="clear:both;"></div>
				<p>Or <a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824809">subscribe</a> to just the audio!</p>
			</div>
			<div class="right_col_box front_box subscribe">
				<h2>Complete Teaching Archive</h2>
				Looking for the old audio archive? <a href="http://sermons.scottsdalebible.com/">Find it here!</a>
			</div>
		</div>';
	//}
	
}
?>