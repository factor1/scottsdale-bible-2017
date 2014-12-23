<?php 
/* Template Name: Watch page */ ?>

<?php get_header(); ?>



<div class="page clearfix">
<div class="main_content wide clearfix">



<article class="clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="titlebar" style="background-color:<?php the_field('title_bar_color'); ?>;">
	<h1><?php the_title(); ?></h1>
	<!-- div class="social button">Share</div>
	<div class="social_tools">Coming soon	</div -->
</div>

<?php //echo do_shortcode('[seriesengine_wo enmse_dsst=1 enmse_sort=1]') ?>
<!-- h2>To experience the full service, <a href="#">click here</a> and check out Scottsdale Bible Online or watch Sunday's message above.</h2-->
			
<?php the_content(); ?>

<?php echo do_shortcode('[seriesengine_wo  enmse_e=1 enmse_r=1 enmse_sort=1 enmse_a=1]') ?>

<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
</div><!-- End content -->
<div class="clear"></div>
<?php endwhile; endif; ?>
</article>


</div><!-- end main_content -->

</div><!-- end page content container -->
<?php get_footer(); ?>
