<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="/wordpress/wp-content/themes/sbc/images/favicon.ico">
<link rel="apple-touch-icon" href="/wordpress/wp-content/themes/sbc/images/apple-touch-icon.png"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php
$remote_ips = array('68.110.95.17', '174.17.246.227', '184.183.3.166');
if(in_array($_SERVER['REMOTE_ADDR'], $remote_ips))
{
?>
<script type="text/javascript" src="//use.typekit.net/aww5xwt.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link rel="stylesheet" href="/wordpress/wp-content/themes/sbc/style-header-new.css" type="text/css" media="screen" />
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<?php
}
?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<script type="text/javascript">if (top !== self) top.location.replace(self.location.href);</script>
<script type="text/javascript" src="/wordpress/wp-content/themes/sbc/javascript/js_libraries.js"></script>
<!--[if IE]><script type="text/javascript" src="/wordpress/wp-content/themes/sbc/javascript/bgiframe_2.1.1/jquery.bgiframe.js"></script><![endif]-->
<link rel="stylesheet" href="/wordpress/wp-content/themes/sbc/css/datePicker.css" type="text/css" media="screen" /> 
<script type="text/javascript" src="/wordpress/wp-content/themes/sbc/javascript/js_custom.js"></script>
 <!--[if lt IE 7.]>
<script defer type="text/javascript" src="/wordpress/wp-content/themes/sbc/javascript/pngfix.js"></script>
<![endif]-->
</head>
<?php 
if($post->ID == '186' || $post->post_parent == '186')
{
	echo '<body style="background: #FFF url(\'/wordpress/wp-content/themes/sbc/images/white-green.jpg\') repeat-x left top;">';
}
else
{
	echo '<body style="background: #FFF url(\'/wordpress/wp-content/themes/sbc/images/white-gray.jpg\') repeat-x left top;">';
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=153173996680";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="header">
<div class="container">
<div class="top_links">
<?php
if(in_array($_SERVER['REMOTE_ADDR'], $remote_ips))
{
?>
<div class="fb-like" data-href="http://scottsdalebible.com" data-send="false" data-layout="button_count" data-width="83" data-show-faces="false" data-font="arial"></div>
<?php
}
?>
<ul id="top_links">
<?php wp_list_pages('title_li=0&depth=-1&include=174,9502,641,789,66'); ?>
</ul>
</div>
</div>
</div>

<?php
if(!in_array($_SERVER['REMOTE_ADDR'], $remote_ips))
{
?>
<?php 
if($post->ID == '186' || $post->post_parent == '186')
{
	echo '<div id="sub_links-186">';
}
else
{
	echo '<div id="sub_links">';
}
?>
<div class="container">
<div id="navigation">
<ul id="nav">
<li class="page_item"><a href="<?php echo get_option('home'); ?>">Home</a></li>
<?php wp_list_pages('title_li=0&depth=-1&include=2,57,61,65,66,347'); ?>
<li class="page_item"><a href="/tag/sunday-am">Sermons</a></li>
</ul>
<div style="float: right;padding-right: 20px;">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div>
</div>
</div>
</div>
<?php
}
else
{
?>
<div id="sub_links">
	<div class="container">
	<div id="navigation">
	<ul id="nav">
	<li class="page_item"><a class="first_nav" href="#">NEW HERE?</a></li>
	<li class="page_item"><a href="#">ABOUT</a></li>
<li class="page_item"><a href="#">WORSHIP</a></li>
<li class="page_item"><a href="#">CONNECT</a></li>
<li class="page_item"><a href="#">SERVE</a></li>
<li class="page_item"><a href="#">CARE & HELP</a></li>
<li class="page_item"><a href="#">MEDIA & RESOURCES</a></li>
	</ul>
	</div>
	</div>
</div>
<?php
}
?>
<div class="container">
<div id="page1">
