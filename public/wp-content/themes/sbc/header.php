<!doctype html> 

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie ie6"> <![endif]--> 
<!--[if IE 7 ]>    <html lang="en" class="no-js ie ie7"> <![endif]--> 
<!--[if IE 8 ]>    <html lang="en" class="no-js ie ie8"> <![endif]--> 
<!--[if IE 9 ]>    <html lang="en" class="no-js ie ie9"> <![endif]--> 
<!--[if gt IE 9]>  <html lang="en" class="no-js ie">     <![endif]--> 
<!--[if !IE]><!--> <html lang="en" class="no-js">    <!--<![endif]--> 

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<META HTTP-EQUIV="personal" CONTENT="NO-CACHE">
<meta name="rating" content="general"> 



<title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="//scottsdalebible.com/favicon.ico" type="image/x-icon">
<link rel="icon" href="//scottsdalebible.com/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png"/>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
<!-- script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script -->
<link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/foundation/5.0.2/css/foundation.min.css">
<link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/foundation/5.0.2/css/normalize.css" />
<link type="text/css" rel="stylesheet"  href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>




<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home2style.css" type="text/css" media="screen" />

<!-- NEW HEADER -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header2013.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pages2013.css" type="text/css" media="screen" />


<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/headernav14.css"> 



<script type="text/javascript" src="//use.typekit.net/aww5xwt.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>



<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script>
<!-- script language="javascript" src="<?php bloginfo('template_url'); ?>/js/supersubs.js"></script -->
<script language="javascript" src="<?php bloginfo('template_url'); ?>/js/hoverintent.js"></script>


<script>


	jQuery(document).ready(function(){
		jQuery('.sf-menu ul.sub-menu') {
			//minWidth:	20,	 // minimum width of submenus in em units
			//maxWidth:	27,	 // maximum width of submenus in em units
			//extraWidth:	1,	 // extra width can ensure lines don't sometimes turn over
			delay:         1800,                // the delay in milliseconds that the mouse can remain outside a submenu without it closing
		  animation:     {opacity:'show'},   // an object equivalent to first parameter of jQuery’s .animate() method. Used to animate the submenu open
		  animationOut:  {opacity:'hide'},   // an object equivalent to first parameter of jQuery’s .animate() method Used to animate the submenu closed
		  speed:         'normal',           // speed of the opening animation. Equivalent to second parameter of jQuery’s .animate() method
		  speedOut:      'normal', 
			cssArrows:     true               // if true, arrow mark-up generated automatically
							 // due to slight rounding differences and font-family
		}).superfish();		 // call supersubs first, then superfish, so that subs are
							 // not display:none when measuring. Call before initialising
							 // containing tabs for same reason.
	};


</script>

<!--[if IE 8]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/modernizer.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header2013_ie8.css" type="text/css" media="screen" />

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
<header class="mainheader">
<div class="utilityrow clearfix">
<div class="small-6 columns">
	<ul class="inline-list">
	<li><a href="//scottsdalebible.com/location"><i class="fa fa-map-marker"></i> Shea Campus</a></li>
	<li><a href="//scottsdalebible.com/chapel">Grace Chapel</a></li>
	<li><a href="//scottsdalebible.com/worship-and-creative-arts/venue/">The Venue</a></li>
	<li><a href="//scottsdalebible.com/cactus/">Cactus Campus</a></li>
	<!-- li><a href="//scottsdalebible.com/next/">Next Campus</a></li -->
	</ul>
</div>

<div class="small-6 columns">
	<ul class="inline-list right-list">
	<li><a href="//scottsdalebible.com/follow/"><i class="fa fa-location-arrow"></i> Subscribe / Follow</a></li>
	<li><a href="https://my.scottsdalebible.com/portal/online_giving.aspx?filter=campus:1"><i class="fa fa-mobile-phone"></i> Online Giving</a></li>
	<li><a href="//scottsdalebible.com/search/"><i class="fa fa-search"></i> Search</a></li>
	</ul>
</div>
</div>

<!-- End Utility nav Row -->

<div class="row brand">
<div class="large-3 columns">
<h2><a href="//scottsdalebible.com/"><img src="<?php bloginfo('template_url'); ?>/images/sbclogo_clean.png" alt="sbclogo_clean" width="214" height="64"></a></h2>
</div>
</div>

	
<nav>
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class'  => 'sf-menu', ) ); ?>
</nav>


<!-- php 
if ( is_single() ) {
	// Returns nothing if we are on the new page.
}
else {
	echo '<div class="breadcrumbs">';
	wordpress_breadcrumbs();
	echo '</div>';
}
-->

</header>







