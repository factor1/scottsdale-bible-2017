<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/pages2013.css" type="text/css" media="screen" />


<div class="page clearfix">
<article class="clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="titlebar" style="background-color:<?php the_field('title_bar_color'); ?>;">
	<h1><?php the_title(); ?></h1>
	<!-- div class="social button">Share</div>
	<div class="social_tools">Coming soon	</div -->
</div>



<div class='content'>

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
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
</div><!-- End content -->
<div class="clear"></div>
<?php endwhile; endif; ?>
</article>


</div><!-- end main_content -->

<?php get_sidebar('page'); ?>

</div><!-- end page content container -->
<?php get_footer(); ?>