<?php 
/* Template Name: Default page */ ?>

<?php get_header(); ?>



<div class="page clearfix">

<?php 
//for calendar

$use_wide = array(65, 1927, 1940, 648, 4430, 10065, 16742, 27224);

if(in_array($post->ID, $use_wide))
{
	echo '<div class="main_content wide clearfix">';
}
else
{
	echo '<div class="main_content clearfix">';
}
?>


<article class="clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="titlebar" style="background-color:<?php the_field('title_bar_color'); ?>;">
	<h1><?php the_title(); ?></h1>
	<!-- div class="social button">Share</div>
	<div class="social_tools">Coming soon	</div -->
</div>

<!-- IF we have a thumbnail, lets get it, and frame it!   -->
	<?php if(has_post_thumbnail()) {
		echo '<div class="featured clear">' ;
		echo the_post_thumbnail('page-feature');
		echo '</div>';
		} else {	}
		?>
		
<!-- IF we have a slider, lets drop it here -->
<?php if(get_field('slider_shortcode'))
{
	echo '<div class="featured clear">' ;
	echo get_f1slider(get_field('slider_shortcode'));
	echo '</div>';
}

?>		



<!-- IF we have an excerpt, lets get it, and box it!   -->
<?php if ($post->post_excerpt != "" ) {
	echo "<div class='excerpt'>".$post->post_excerpt."</div><div class='content narrow'>";}
	
	else {
		echo "<div class='content'>";	}
	?>

	<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			<a class="addthis_button_pinterest_pinit"></a>
			<a class="addthis_counter addthis_pill_style"></a>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50c183342a601a50"></script>
<!-- AddThis Button END -->
	
	<?php the_content(); ?>
	<?php edit_post_link('Edit this entry.', '<p class="clear">', '</p>'); ?>
	
</div><!-- End content -->
<div class="clear"></div>
<?php endwhile; endif; ?>
</article>


</div><!-- end main_content -->



<?php 
// Hide the sidebar totally on wide pages. Ugh I hate the way this theme is coded. 
if (! is_page(array(65, 1927, 1940, 648, 4430, 10065, 16742, 27224))) : ?>
<?php get_sidebar('page'); ?>
  <?php endif; ?>

</div><!-- end page content container -->
<?php get_footer(); ?>
