<?php
include(TEMPLATEPATH . '/ministry_contacts.php');

$ministry_array_keys = array_keys($ministry_contacts);

$ministry_page_post_cats = array(

	'149'=>array('65', 'ACCESS', 'scottsdalebible.com_qirqebbvgfdceqi0pln32slh44@group.calendar.google.com'),
	'200'=>array('68', 'Worship Arts', 'scottsdalebible.com_4buld4kddlh657rl8it097vpd8@group.calendar.google.com'),	
	'180'=>array('99', 'Counseling', 'scottsdalebible.com_qmifqjd4a6m8q0qu33a6arptbk@group.calendar.google.com'),
	'2335'=>array('58', 'Financial Ministry'),
	'53'=>array('59', 'Marriage Ministry', 'scottsdalebible.com_a4uq8hpk6n0dfde95lv30hcrqk@group.calendar.google.com'),
	'1712'=>array('62', 'Faith Forward'),
	'149'=>array('65', 'ACCESS', 'scottsdalebible.com_qirqebbvgfdceqi0pln32slh44@group.calendar.google.com'),
	'2707'=>array('67', 'IMPACT', 'scottsdalebible.com_lcl9a1knpjrli8umhurfoht1gc@group.calendar.google.com'),
	'2996'=>array('69', 'Club 56', 'scottsdalebible.com_ov65tkmjp9hvr1ia8fgabgcob0@group.calendar.google.com'),
	'3183'=>array('140', 'High School', 'scottsdalebible.com_5k5kejcdi7gis30gppcj38nr9c@group.calendar.google.com'),
	'192'=>array('70', 'Second Half', 'scottsdalebible.com_bhp5rvu2811pm4s406cnu6vbi0@group.calendar.google.com'),
	'1746'=>array('78', 'Reformed Living'),
	'1720'=>array('64', 'Christian Essentials'),
//	'196'=>array('115', 'Student Ministries', 'scottsdalebible.com_lcl9a1knpjrli8umhurfoht1gc@group.calendar.google.com'),
	'6113'=>array('204', 'College Group', 'scottsdalebible.com_o3hebps0s4tom6amafkupc5upk@group.calendar.google.com'),
	'8883'=>array('219', 'Auxano', 'scottsdalebible.com_abpbnim5jdvi1cc4n8soa4ka1k@group.calendar.google.com'),	
	'198'=>array('50', 'Women\'s', 'scottsdalebible.com_5humftj8q044k1urvf3or2jpk0@group.calendar.google.com'),

	//temporarily removed due to pages not executing
	//	'190'=>array('12', 'Outreach', 'scottsdalebible.com_6fc1mmehlccm33ahrjfvnhrfgk@group.calendar.google.com')
	//	'186'=>array('60', 'Men\'s Ministry', 'scottsdalebible.com_dcgf6s9m6alrllnjvjbpsrj3vc@group.calendar.google.com'),
	//	'178'=>array('129', 'somanorth', 'scottsdalebible.com_ga4f64k0b4r5798inuomsdssmc@group.calendar.google.com'),
		'73'=>array('10', 'Children\'s', 'scottsdalebible.com_6egrmrs8ppj3kp2cdn2g20u780@group.calendar.google.com'),
		'182'=>array('51', 'Special Ministries', 'scottsdalebible.com_r5fkscdbl4c97prto6ov26hqis@group.calendar.google.com'),
	//	'194'=>array('130', 'Spiritual Formation', 'scottsdalebible.com_1naqur6jamt4h8a104u44b26ek@group.calendar.google.com'),
	);
//counseling = 180
/*
All Church Events

ACCESS
Tech
Bookstore
Children's
Young Adult
Communication
Counseling
Facility
Hospitality
Marriage
Men's
Operations
Outreach
Second Half
Special Ministries
Spiritual Growth
Student
Women's
Worship
	*/
$class_colors = 'front_box-' . $post->ID . ' front_box-' . $post->post_parent;
$class_colors_right = 'right_col_box-' . $post->ID . ' right_col_box-' . $post->post_parent;
$post_parent_obj = get_post($post->post_parent);

if(is_page() || is_single())
{
	if(is_single())
	{
		foreach((get_the_category()) as $category) 
		{ 
			if($category->cat_ID == 5)
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
	$gcal_address = $ministry_page_post_cats[$event_post_category][2];
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
		if($gcal_address)
		{
			$events_title = $ministry_page_post_cats[$event_post_category][1] . ' Events';
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
	
	if($post->ID == 4951)
	{
		echo'
		<div class="front_box  ' . $class_colors . ' right_col_box ' . $class_colors_right . '">
			<h2>Categories</h2>
		<ul>';
		wp_list_categories('title_li=&orderby=name&include=116,113,12,113&show_count=1');
		echo '</ul>';
		echo '</div>';
	}
		
		if($gcal_address)
		{
		echo '
			<div class="front_box  ' . $class_colors . ' right_col_box ' . $class_colors_right . '">';
			echo '<h2>' . $events_title . '</h2>';
			if($_GET['cal'])
			{
				include('./wordpress/wp-content/themes/sbc/gcal1.php');
			}
			else
			{
				include('./wordpress/wp-content/themes/sbc/gcal.php');
			}
		echo '</div>';
		}
		else
		{

			echo '
				<div class="front_box  ' . $class_colors . ' right_col_box ' . $class_colors_right . '">
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
				$alternate_url = get_post_meta($post2->ID, 'alternate_url', 'true');
				if($removal_time > time() && $count < 5)
				{
					$link_for_post = '/upcoming-events/' .  $post2->post_name;
					if($alternate_url)
					{
						$link_for_post = $alternate_url;
					}
					echo '<li>
					<a href="' . $link_for_post . '">' . $post2->post_title . '</a><br />
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
		$postslist = get_posts('numberposts=10&orderby=date&tag=' . $post->post_name);
		if(!$postslist)
		{
			$postslist = get_posts('numberposts=10&orderby=date&tag=' . $post_parent_obj->post_name);
		}
		
		if($postslist)
		{
			echo'<div class="front_box  ' . $class_colors . ' right_col_box ' . $class_colors_right . '">
			<h2>Blog Posts</h2>';
		
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
					//echo date('n/j', $timestamp);
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
				<div class="front_box  ' . $class_colors . ' right_col_box ' . $class_colors_right . '">
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
		echo '<div class="front_box  ' . $class_colors . ' right_col_box ' . $class_colors_right . '">
			
					<h2>Other Links</h2>
					<ul>';
					wp_list_pages('title_li=0&depth=0&include=65,174');
				echo '
					<li><a href="http://sbcserves.com">Serving Opportunities</a></li>
					</ul>
				</div>';
		
		
		echo '</div>';
					}
}
if(is_single())
{
	foreach((get_the_category()) as $category) 
	{ 
		if($category->cat_ID == 5)
		{
			echo '<div class="right_col">
			<!--<div class="right_col_box front_box">
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
			echo'</div>-->
			<div class="right_col_box front_box subscribe">
				<h2>Sermon Resources</h2>
				<ul>';
					$notes_blank_test = './assets/notes/' . $message_date . 'BlankNotes.pdf';
					$notes_filled_test = './assets/notes/' . $message_date . 'FilledInNotes.pdf';
					$bulletin_inside_test = './assets/bulletin/' . $message_date . 'Bulletin.pdf';
					
					if($audio_file)
					{
						echo '<li><a href="' . $audio_file . '">Audio Download</a></li>';
					}
					if($video_file)
					{
						echo '<li><a href="' . $video_file . '">Video Download</a></li>';
					}
					if($video_file_large)
					{
						echo '<li><a href="' . $video_file_large . '">Video Download (Large)</a></li>';
					}
					
					if(file_exists($bulletin_inside_test))
					{
						echo '<li><a href="' . trim($bulletin_inside_test, '.') . '" target="_blank">Inside of Bulletin</a>';
					}
					if(file_exists($notes_blank_test))
					{
						echo '<li><a href="' . trim($notes_blank_test, '.') . '" target="_blank">Sermon Notes Blank</a>';
					}
					if(file_exists($notes_filled_test))
					{
						echo '<li><a href="' . trim($notes_filled_test, '.') . '" target="_blank">Sermon Notes Filled In</a>';
					}
					echo '
				</ul>
			</div>';
			
			$small_group_curriculum = './assets/small_group/' . $message_date . 'Curriculum.pdf';
			$small_group_video = get_post_meta($post->ID, 'small_group_video', 'true');
			if(file_exists($small_group_curriculum) || $small_group_video)
			{
			echo '
			<div class="right_col_box front_box subscribe">
				<h2>Small Group Resources</h2>
				<ul>';
					if(file_exists($small_group_curriculum))
					{
						echo '<li><a href="' . trim($small_group_curriculum, '.') . '" target="_blank">Small Group Curriculum</a>';
					}
					$small_group_video = get_post_meta($post->ID, 'small_group_video', 'true');
					if($small_group_video)
					{
						echo '<li><a href="' . trim($small_group_video, '.') . '" target="_blank">Small Group Video</a>';
					}
					echo '
				</ul>
			</div>
			';
			}
			echo '
			<div class="right_col_box front_box subscribe">
				<h2>Subscribe to our Podcast</h2>
				<a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824509"><img src="/wordpress/wp-content/themes/sbc/images/podcast_logo_sized.jpg" class="rss" /> Subscribe with iTunes!</a>
				Automatically download video messages on Sunday!
				<div style="clear:both;"></div>
				<p>Or <a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824809">subscribe</a> to just the audio!</p>
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
			<!--<div class="right_col_box front_box subscribe">
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
			</div>-->
			<div class="right_col_box front_box subscribe">
				<h2>Subscribe to our Podcast</h2>
				<a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824509"><img src="/wordpress/wp-content/themes/sbc/images/podcast_logo_sized.jpg" class="rss" /> Subscribe with iTunes!</a>
				Automatically download video messages on Sunday!
				<div style="clear:both;"></div>
				<p>Or <a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824809">subscribe</a> to just the audio!</p>
			</div>
		</div>';
	//}
	
}
?>
