<?php
if($_GET['new'])
{
?>
<?php get_header(); ?>
<div id="top_front_content">
<div id="slides">
<div id="s1" class="pics">
<!--<a href="/guest"><img src="/wordpress/wp-content/themes/sbc/images/slides/starting-point.jpg" height="275" width="644" /></a>-->
<!--<a href="/news/serving"><img src="http://scottsdalebible.com/wordpress/wp-content/themes/sbc/images/slides/webbanner-02.jpg" height="275" width="644" /></a>-->
<a href="#"><img src="http://scottsdalebible.com/wordpress/wp-content/uploads/WelcometoSBC-Slide.jpg" height="275" width="644" /></a>
<a href="/winterfest"><img src="http://scottsdalebible.com/wordpress/wp-content/uploads/winterfest.jpg" height="275" width="644" /></a>
<!--<a href="/embracegrace/church"><img src="http://scottsdalebible.com/wordpress/wp-content/uploads/embracegraceS4web.jpg" width="644" /></a>-->
<!--<a href="/upcoming-events/the-blessing-challenge"><img src="http://scottsdalebible.com/wordpress/wp-content/uploads/theblessingchallengeweb.jpg" height="275" width="644" /></a>-->
<!--<a href="/upcoming-events/mens-summit-2011"><img src="http://scottsdalebible.com/wordpress/wp-content/themes/sbc/images/slides/mens-calltocourage.jpg" height="275" width="644" /></a>-->
<!--<a href="/upcoming-events/food-drive"><img src="http://scottsdalebible.com/wordpress/wp-content/uploads/fooddriveweb1.jpg" height="275" width="644" /></a>-->
<!--<a href="/upcoming-events/soma-h2o-fall-retreat"><img src="http://scottsdalebible.com/wordpress/wp-content/uploads/SomaHavasuWeb.jpg" height="275" width="644" /></a>-->
<!--<img src="/wordpress/wp-content/themes/sbc/images/slides/memorial-day.jpg" height="275" width="644" />-->
<!--<a href="/ministries/women/bible-studies"><img src="/wordpress/wp-content/themes/sbc/images/slides/woman-bible.jpg" height="275" width="644" /></a>-->

<!--<a href="/upcoming-events/holy-land-experience"><img src="/wordpress/wp-content/themes/sbc/images/slides/holy-land-2012.jpg" height="275" width="644" /></a>-->
<!--<a href="/about/vision-mission-values"><img src="/wordpress/wp-content/themes/sbc/images/slides/vision_2010.jpg" height="275" width="644" /></a>-->
</div>
</div>
<div id="upcoming_events" class="front_box">
	<h2>Upcoming Events</h2>
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
		if($removal_time > time() && $count < 5)
		{
			if($alternate_url)
			{
				echo '<li' . $first . '><span class="date">' . $display_date . '</span><a href="' . $alternate_url . '">' . $post->post_title . '</a><br />' . $post->post_excerpt . '</li>';
			}
			else
			{
				echo '<li' . $first . '><span class="date">' . $display_date . '</span><a href="/upcoming-events/' . $post->post_name . '">' . $post->post_title . '</a><br />' . $post->post_excerpt . '</li>';
			}
			if($first == ' class="first"'){$first = '';}
			$count++;
		}
		else
		{
			//echo '<!-- time2: ' . date('r', $removal_time). ' -->';
		}
	}
	 ?>
	 </ul>
</div>
<hr>
</div>
<div style="clear: both; margin: 0px; padding: 0px;"></div>
<div id="main_front_content">
<div id="main_sermons" class="front_box_gray">
	<h2>Latest Sermon</h2>
	<?php
	 global $post;
	 $myposts = get_posts('numberposts=1&category=5,-78');
	 
	 foreach($myposts as $post) :
	 setup_postdata($post);
	 $metapassage = get_post_meta($post->ID, 'passage', 'true');
	 $metapassage = explode(';', $metapassage);
	 $latest_posted_sermon_date = $post->post_date;
	 $latest_sermon_title = $post->post_title;
	 
	/*foreach((get_the_category()) as $category) 
	{ 
		if($category->category_parent == 32)
		{
			$latest_sermon_speaker = $category->cat_name;
			$sermon_speaker =  '<a href="/tag/jamie-rasmussen">Jamie Rasmussen</a>';
		}
	}*/
		$sermon_speaker =  '<a href="/tag/jamie rasmussen">Jamie Rasmussen</a>';
		
	 ?>
	 <strong><a href="<?php the_permalink(); ?>" style="font-size: 14px;"><?php the_title(); ?></a></strong> <span style="margin: 0px; margin-left: 4px; padding: 0px; color: #777777; background: transparent; font-weight: bold; border: 0px;"><?php the_date('F j'); ?></span><br />
	 <?php echo $sermon_speaker;?><br />
	 <?php echo $metapassage[0] . ' | '; ?>
		 <a href="<?php the_permalink(); ?>/#respond">Respond</a><br /><br />
	 <?php endforeach; ?>
	 
	 <img src="/wordpress/wp-content/themes/sbc/images/sermon_screenshot.jpg" class="sermon_image" />
	 <ul class="watch">
	 <li><a href="<?php the_permalink(); ?>">Watch Now!</a></li>
	 <li><a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824509">Subscribe</a></li>
	 <li><a href="/category/sermons">Archive</a></li>
	 <?php
	$followup = get_post_meta($post->ID, 'followup_url', 'true');
	if($followup)
	{
		echo '<li><a href="' . $followup . '">Followup Video</a></li>';
	}
	?>
	 </ul>
</div>
<div id="main_worship_services" class="front_box_gradient">
<h2>Sunday Worship Services</h2>
<?php
	$future_sermons = get_posts('category=5&post_status=future');
	$next_sermon = $future_sermons[sizeof($future_sermons) - 1];
	
	foreach($future_sermons as $fsermon)
	{
		//echo '<!-- ' . $fsermon->post_title . ' -->';
	}
	
	
	if(strtotime($next_sermon->post_date) > time())
	{
		$next_sermon_title = $next_sermon->post_title;
	}
	
	setup_postdata($next_sermon);
	$next_sermon_passage = get_post_meta($next_sermon->ID, 'passage', 'true');
	$next_sermon_passage = explode(';', $next_sermon_passage);
	 foreach((get_the_category()) as $category) 
	{ 
		if($category->category_parent == 32)
		{
			$sermon_speaker =  $category->cat_name;
		}
	}
	$day = date("D");
	$label_text = 'Next week';
	if($day == 'Sun')
	{
		$today_sunday = date('d');
		$sermon_day = date('d', $latest_posted_sermon_date);
		//echo '<!-- today: ' . $today_sunday . ' sermon:' . $sermon_day . '-->';
		if($today_sunday == $sermon_day - 1)
		{
			//echo '<!-- show today -->';
			$next_sermon_title = $latest_sermon_title;
			$sermon_speaker = $latest_sermon_speaker;
		}
		$label_text = 'Next Week';
	}
	//$label_text = 'Latest Sermon';
	$next_sermon_title = 'Angels We Have Heard';

	$sermon_speaker = 'Jamie Rasmussen';
	echo '<div style="clear: both;"></div>';
	echo '<p><strong>' . $label_text . ':</strong> <em>' . $next_sermon_title . '</em><br />' . $sermon_speaker . ' </p>';
//; ' . $next_sermon_passage[0] . ', ' . $next_sermon_passage[1] . '
?>
<p><strong><a href="/ministries/worship-and-creative-arts/morning-services">Classic</a></strong><br />
<strong>8 a.m.</strong>, Worship Center<br />
Timeless worship often including our choir and orchestra</p>
<p><strong><a href="/ministries/worship-and-creative-arts/morning-services">Blended</a></strong><br />
<strong>9:30 a.m.</strong>, Worship Center<br />
Diverse, dynamic worship including a wide variety of instrumentation and vocals</p>
<p><strong><a href="/ministries/worship-and-creative-arts/morning-services">Contemporary</a></strong><br />
<strong>11:10 a.m.</strong> High School Building<br />
<strong>11:15 a.m., 5 p.m.</strong>, Worship Center<br />
Modern, energetic worship in a band-driven environment</p>
</div>
<?php
if(!$_GET['test'])
{
	echo '
	<div id="main_worship_services" class="front_box_gradient">
	<a href="/blog" style="color: #fff">
	<h2>Scottsdale Bible Blog</h2></a>';
	
	$newsposts = get_posts('numberposts=6&meta_key=front_page&meta_value=true');
	if($newsposts != null)
		echo '<ul>';
	{
		foreach($newsposts as $post)
		{
			setup_postdata($post);
			$alternate_url = get_post_meta($post->ID, 'alternate_url', 'true');
			if($alternate_url)
			{
			?>
				<li><a href="<?php echo $alternate_url; ?> "><?php the_title(); ?></a>, 
			<?php
			}
			else
			{
			?>
			<li><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a>, 
			<?php
			}
			foreach((get_the_category()) as $category)
			{ 
				if($category->cat_ID != 4)
				{
					echo '<a style="color: #777777" href="category/' . $category->category_nicename . '">' . $category->cat_name . '</a>';
					break;
				}
			} 
			?>
		</li>
			<?php
		}
		echo '</ul>';
		echo '<a href="http://sbcserves.com"><img src="/wordpress/wp-content/themes/sbc/images/buttons/sbcserves_banner.jpg" style="padding-bottom: 2px;" /></a>';
	}
	echo '
	</div>
	';
}
else
{
	echo '
<div id="main_buttons">
<a href="/about"><img src="/wordpress/wp-content/themes/sbc/images/buttons/new_to_SBC.jpg" style="padding-bottom: 2px;" /></a>
<a href="/ministries/serving-opportunities"><img src="/wordpress/wp-content/themes/sbc/images/buttons/sbcserves_banner.jpg" style="padding-bottom: 2px;" /></a>
<a href="/your-turn"><img src="/wordpress/wp-content/themes/sbc/images/buttons/your_turn.jpg" /></a>
</div>
';
}


?>
<div id="lower_location" class="front_box_gray">
	<h2>Our Location</h2>
	7601 East Shea Boulevard
	<br />
	Scottsdale, AZ
	<br /><br />
<a href="/about/location">Get Directions</a> | <a href="/ministries/facilities-maintenance">View Campus Map</a>
</div>
<div id="lower_featured" class="front_box_gray_long">
	<h2>Children, Students and Young Adults</h2>
	<table width="100%">
<tr>
<td><a href="/ministries/children"><img src="/wordpress/wp-content/themes/sbc/images/kcrg.jpg" alt="Children's Ministry" /></a></td>
<td><a href="/ministries/club-56"><img src="/wordpress/wp-content/themes/sbc/images/club_56.jpg" alt="Club56" /></a></td>
<td><a href="/ministries/impact-junior-high"><img src="/wordpress/wp-content/themes/sbc/images/impact.png" alt="Impact" /></a></td>
<td><a href="http://hsministry.com"><img src="/wordpress/wp-content/themes/sbc/images/hsm.png" alt="High School Ministries" /></a></td>
<td><a href="http://www.somanorth.com"><img src="/wordpress/wp-content/themes/sbc/images/somanorth.png" alt="somanorth" /></a></td>
<td><a href="ministries/special-ministries"><img src="/wordpress/wp-content/themes/sbc/images/special-ministries.jpg" alt="Special Ministries" /></a></td>
</tr>
</table>
</div>
<div class="bottom_links" style="padding-right: 30px; width: 200px;">
<a href="http://www.facebook.com/scottsdalebible" alt="Scottsdale Bible on Facebook"><img src="/wordpress/wp-content/themes/sbc/images/scottsdale-bible-facebook.jpg" /></a>
<br /><br />
<a href="http://twitter.com/scottsdalebible" alt="Scottsdale Bible on Twitter"><img src="/wordpress/wp-content/themes/sbc/images/twitter_sbc.gif" /></a>
<br />

</div>
<div class="bottom_links">
<h4>About SBC</h4>
<ul>
<?php wp_list_pages('title_li=0&depth=1&child_of=2');?>
</ul>
</div>
<div class="bottom_links">
<h4>Ministries</h4>
<ul>
<?php wp_list_pages('title_li=0&depth=1&child_of=57');?>
</ul>
</div>
<div class="bottom_links">
<h4>Leadership</h4>
<ul>
<?php wp_list_pages('title_li=0&depth=1&child_of=347');?>
</ul>
</div>
<div class="bottom_links">
<h4>Contact Us</h4>
<ul>
<li>480.824.7200 - Phone</li>
<li>480.707.0499 - Fax</li>
<li>feedback@scottsdalebible.com</li>
<li><br />7601 East Shea Boulevard<br />Scottsdale, AZ 85260</li>
</ul>
</div>
<hr>
</div>
<?php get_footer(); ?>
<?php } 
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<meta name="keywords" content="scottsdale bible church, christian, worship, sunday, jamie rasmussen" />
<link rel="canonical" href="http://scottsdalebible.com/" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="/assets/new/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="/assets/new/jquery.cycle.lite.js"></script>
<script type="text/javascript" src="https://use.typekit.com/aww5xwt.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<title>SBC Index</title>
<script>
$(document).ready(function(){

$('#slider').cycle({ 
    fx:     'fade',
    timeout: 6000, 
    prev:  '#prev', 
    next:  '#next'
});

});
</script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=153173996680";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="container">
	<div id="section1" class="container_padding">
		<a href="http://scottsdalebible.com"><img src="/assets/new/images/logo.png" class="main_logo" /></a>
		<div class="fb-like" data-href="http://scottsdalebible.com" data-send="false" data-layout="button_count" data-width="83" data-show-faces="false" data-font="arial"></div>
		<div id="search">
			<a href="/your-prayer-requests">Need Prayer?</a> | <a href="/leadership/all-staff">Contact Us</a> | <a href="http://jobs.scottsdalebible.com">Job Board</a>
			<div style="float: right;padding-right: 20px;">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</div>
		</div>
	</div><!--section1-->
	<div id="section2">
		<ul id="nav">
			<li class="main_menu"><a href="/new"><img src="/assets/new/images/new_here.jpg" /></a></li>
			<li class="main_menu"><a href="/about"><img src="/assets/new/images/about_us.jpg" /></a><div id="submenu"><ul><li><a href="/about/leadership">Our Leaders</a></li><li><a href="calendar">Calendar</a></li><li><a href="/about/we-believe">We Believe</a></li><li><a href="/about/our-story">Our Story</a></li><li><a href="/ministries">Ministries</a></li></ul></div></li>
			<li class="main_menu"><a href="/ministries"><img src="/assets/new/images/ministries.jpg" /></a></li>
			<li class="main_menu"><a href="/connect"><img src="/assets/new/images/connect.jpg" /></a></li>
			<li class="main_menu"><a href="/news/serving"><img src="/assets/new/images/serve.jpg" /></a></li>
			<li class="main_menu"><a href="#"><img src="/assets/new/images/media.jpg" /></a><div id="submenu"><ul><li><a href="/tag/sunday-am">Sermons</a></li><li><a href="/about/compass">Compass</a></li><li><a href="/my-stories">My Stories</a></li><li><a href="/bookstore">Bookstore</a></li><li><a href="/photos">Photo Gallery</a></li></ul></div></li>
		</ul>
		
	</div><!--section2-->
	<div id="section3" class="container_padding">
		<div id="slider">		
			<a href="/stay-connected"><img src="/assets/new/images/enewsWEB.jpg" /></a>
			<a href="/compass"><img src="/assets/new/images/NovemberCOMPASSWEB.jpg" /></a>
		</div>
		<a id="button_left" href="javascript:void(0);"><img src="/assets/new/images/arrow_left.png" id="prev" /></a>
		<a id="button_right" href="javascript:void(0);"><img src="/assets/new/images/arrow_right.png" id="next" /></a>
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
			<a href="/new"><img src="/assets/new/images/slot1.jpg" /></a>
		</div>
		<div id="slot2">
			<a href="/multisite"><img src="/assets/new/images/CactusCampusminislide.jpg" /></a>
		</div>
		<div id="slot3">
			<a href="/sermons/why-follow-jesus">
				<img src="/assets/new/images/speaker.jpg" />
				<img src="/assets/new/images/latest_message.jpg" />
				<img id="button_play" src="/assets/new/images/play.png" />
			</a>
		</div>
	</div><!--section4-->
	<div id="section5" class="container_padding">
		<div id="column1">
			<h2 class="font-blue">sunday worship</h2>
			<p>NEXT WEEK: <span class="font-blue">Conquering the Unconquerable<span></p>
			<p>SCRIPTURE: <span class="font-blue">1 Samuel 17</span></p>
			<p>SPEAKER: <span class="font-blue">Lucas Cooper</span></p>
			<span class="subtitle">WORSHIP CENTER</span>
			<p class="font-blue">CLASSIC: 8:00AM</p>
			<p class="font-blue">BLENDED: 9:30AM</p>
			<p class="font-blue">CONTEMPORARY: 11:15AM & 5PM</p>
			<span class="subtitle">THE VENUE <span class="venue">(ON-SITE VIDEO VENUE)</span></span>
			<p class="font-blue">CONTEMPORARY: 9:30 & 11:15AM</p>
			<p class="copyright">&#169; 2012 Scottsdale Bible | All Rights Reserved</p>
		</div>
		<div id="column2">
			<h2 class="font-blue">contact us</h2>
			<p>
				7601 E SHEA BOULEVARD,
			</p>
			<p>
				<span class="address">SCOTTSDALE, AZ 85260 <span class="font-blue"><a href="/about/location">(MAP)</a></span></span>
			</p>
			<p class="font-blue" style="margin-top:10px">PHONE: <span class="font-white">480.824.7200</span></p>
			<p class="font-blue">EMAIL: <span class="font-white">FEEDBACK@SCOTTSDALEBIBLE.COM</span></p>
			<p class="font-blue">FAX: <span class="font-white">480.707.0499</span></p>
		</div>
		<div id="column3">
			<p class="social">FOLLOW US: 
				<a href="http://facebook.com/scottsdalebible"><img src="/assets/new/images/facebook.png" /></a>
				<a href="http://twitter.com/scottsdalebible"><img src="/assets/new/images/twitter.png" /></a>
				<a href="http://flickr.com/scottsdalebible"><img src="/assets/new/images/flickr.png" /></a>
				<a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824509"><img src="/assets/new/images/itunes.png" /></a>
				<a href="http://phobos.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=286824509"><img src="/assets/new/images/feeds.png" /></a>
			</p>
			<div class="fb-like-box" data-href="http://www.facebook.com/scottsdalebible" data-width="292" data-show-faces="true" data-stream="false" data-header="true"></div>
		</div>
	</div><!--section5-->
</div>

<!-- Start Quantcast tag -->
<script type="text/javascript">
_qoptions={
qacct:"p-aalJ8sFCvGENQ"
};
</script>
<?php
if($_SERVER["HTTPS"])
{
	echo '<script type="text/javascript" src="https://edge.quantserve.com/quant.js"></script>';
}
else
{
	echo '<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>';
}
 ?>
<noscript>
<?php
if($_SERVER["HTTPS"])
{
	echo '<img src="https://pixel.quantserve.com/pixel/p-aalJ8sFCvGENQ.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>';
}
else
{
	echo '<img src="http://pixel.quantserve.com/pixel/p-aalJ8sFCvGENQ.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>';
}
 ?>

</noscript>
<!-- End Quantcast tag -->
<!-- Start Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2243545-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<!-- End Google Analytics -->
<!-- Start Chartbeat -->
<script type="text/javascript">
var _sf_async_config={uid:2293,domain:"scottsdalebible.com"};
(function(){
  function loadChartbeat() {
    window._sf_endpt=(new Date()).getTime();
    var e = document.createElement('script');
    e.setAttribute('language', 'javascript');
    e.setAttribute('type', 'text/javascript');
    e.setAttribute('src',
       (("https:" == document.location.protocol) ? "https://s3.amazonaws.com/" : "http://") +
       "static.chartbeat.com/js/chartbeat.js");
    document.body.appendChild(e);
  }
  var oldonload = window.onload;
  window.onload = (typeof window.onload != 'function') ?
     loadChartbeat : function() { oldonload(); loadChartbeat(); };
})();
</script>
<!-- End Chartbeat -->

</body>
</html>
<?php } ?>
