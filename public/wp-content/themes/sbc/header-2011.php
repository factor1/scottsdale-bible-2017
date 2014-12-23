<!doctype html> 

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie ie6"> <![endif]--> 
<!--[if IE 7 ]>    <html lang="en" class="no-js ie ie7"> <![endif]--> 
<!--[if IE 8 ]>    <html lang="en" class="no-js ie ie8"> <![endif]--> 
<!--[if IE 9 ]>    <html lang="en" class="no-js ie ie9"> <![endif]--> 
<!--[if gt IE 9]>  <html lang="en" class="no-js ie">     <![endif]--> 
<!--[if !IE]><!--> <html lang="en" class="no-js">    <!--<![endif]--> 

<html lang="en">

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	

<head profile="http://gmpg.org/xfn/11">
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />


<title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="http://scottsdalebible.com/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://scottsdalebible.com/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png"/>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home2style.css" type="text/css" media="screen" />

<!-- NEW HEADER -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header2013.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pages2013.css" type="text/css" media="screen" />
<!--[if IE 8 ]> <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header2013_ie8.css" type="text/css" media="screen" /><![endif]-->



<script type="text/javascript" src="//use.typekit.net/aww5xwt.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>

<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/hoverintent.js"></script>
<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script>
<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/supersubs.js"></script>


<script>


	jQuery(document).ready(function(){
		jQuery('ul.sub-menu').supersubs({
			minWidth:	10,	 // minimum width of submenus in em units
			maxWidth:	27,	 // maximum width of submenus in em units
			extraWidth:	1,	 // extra width can ensure lines don't sometimes turn over
			delay:         800,                // the delay in milliseconds that the mouse can remain outside a submenu without it closing
  animation:     {opacity:'show'},   // an object equivalent to first parameter of jQuery’s .animate() method. Used to animate the submenu open
  animationOut:  {opacity:'hide'},   // an object equivalent to first parameter of jQuery’s .animate() method Used to animate the submenu closed
  speed:         'normal',           // speed of the opening animation. Equivalent to second parameter of jQuery’s .animate() method
  speedOut:      'fast', 
			cssArrows:     true               // if true, arrow mark-up generated automatically
							 // due to slight rounding differences and font-family
		}).superfish();		 // call supersubs first, then superfish, so that subs are
							 // not display:none when measuring. Call before initialising
							 // containing tabs for same reason.
	});




</script>




<!--[if IE]><script type="text/javascript" src="/wordpress/wp-content/themes/sbc/javascript/bgiframe_2.1.1/jquery.bgiframe.js"></script><![endif]-->
 <!--[if lt IE 7.]>
<script defer type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/pngfix.js"></script>
<![endif]-->


</head>


<body <?php body_class(); ?> 

<?php
 
if(get_field('image_bg'))
{
	echo 'style="background: url(' . get_field('image_bg') . ') top center no-repeat fixed"';
}
 
?>
>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=153173996680";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	

<div class="wrap clearfix">
<header>
	<h1><a href="http://scottsdalebible.com">SBC</a></h1>
	
	<div class="fb-like" data-href="http://www.facebook.com/scottsdalebible" data-send="false" data-layout="button_count" data-width="83" data-show-faces="false"></div>
	

	<div class="minibar">
	
		<ul>
			<li><a href="" class="campus">Campus Locations</a>
			<div class="mini_drop drop_campus">
			<p>Choose a Campus</p>
				<a href="http://scottsdalebible.com/new" title="main campus" class="campus1"></a>
				<a href="http://www.scottsdalebible.com/venue" title="venue" class="campus2"></a>
				<a href="http://www.scottsdalebible.com/cactus" title="cactus" class="campus3"></a>
			</div></li>
			<!-- End Campus ================== -->
			
			
			<li><a href="http://scottsdalebible.com/follow/" class="subscribe">Subscribe & Follow</a>
			<div class="mini_drop drop_subscribe">
			<ul>
				<li class="fb"><a href="http://scottsdalebible.com/follow/facebook-pages/">Facebook Pages</a></li>
				<li class="tw"><a href="http://scottsdalebible.com/follow/twitter-pages/">Twitter Users</a></li>
				<li class="news"><a href="http://scottsdalebible.com/stay-connected">Weekly eNews</a></li>
				<li class="rss"><a href="http://scottsdalebible.com/follow/">Blogs/RSS Feeds</a></li>
				<li class="pcast"><a href="http://scottsdalebible.com/follow/podcasts/">Podcasts</a></li>
				<li class="flickr"><a href="http://www.flickr.com/photos/scottsdalebible/collections">Flickr Photos</a></li>
				<li class="vimeo"><a href="http://vimeo.com/scottsdalebible">Vimeo Videos</a></li>
			</ul>
			</div></li>
			<!-- End Subscribe ================== -->
			
			
			<li><a href="" class="contact">Contact</a>
			<div class="mini_drop drop_contact">
			
				<p>Scottsdale Bible Church<br>7601 E Shea Boulevard<br>Scottsdale, AZ 85260</p>
			
				<div class="divider"></div>
				
				<p>Office: 480.824.7200<br>Fax: 480.707.0499<br><a class="highlight" href="mailto:feedback@scottsdalebible.com">Email Us</a></p>
			
			</div></li>
			<!-- End Contact ================== -->	
			
		</ul>
		
		
	
		<div class="search_activate"><a href="#">Search</a>
			<div class="search_box"><?php include (TEMPLATEPATH . '/inc/searchform.php'); ?></div>
		</div>
		
	</div>
	
	
<!-- END Mini Bar ===========================   -->	
	
<nav>
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class'  => 'sf-menu', ) ); ?>
</nav>


<?php 
if ( is_single() ) {
	// Returns nothing if we are on the new page.
}
else {
	echo '<div class="breadcrumbs">';
	wordpress_breadcrumbs();
	echo '</div>';
}
?>

</header>







