<?php
/* Template Name: Winter Wonder Program */
get_header();
get_template_part("components/sections/featured-image");
?>

<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/winterwonder.css">

<div class="winterwonder">



<div class="row">
	<h2> Winter Wonder Cast and Crew </h2>
	
<div class="medium-9 medium-centered columns">
	
	<?php get_template_part("components/sections/page-content"); ?>
</div>
</div>
 
 
 
</div> 



<?php get_footer();?>