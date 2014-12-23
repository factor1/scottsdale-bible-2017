<?php /* Template Name: Home */ ?>

<?php get_header(); ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="/assets/new/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="/assets/new/jquery.cycle.lite.js"></script>

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


<div id="container" class="new">
	<div id="section1" class="container_padding">	</div><!--section1-->

	
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
			<div class="fb-like-box" style="background:#fff; float:right;" data-href="http://www.facebook.com/scottsdalebible" data-width="292" data-show-faces="true" data-stream="false" data-header="true"></div>
		</div>
	</div><!--section5-->


<?php get_footer(); ?>
