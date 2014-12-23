<?php 
/* Template Name: Search page */ ?>

<?php get_header(); ?>


<div class="page clearfix">
<div class="main_content wide clearfix">


<article class="clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div style="margin:0 auto; width:600px; display:block; padding:100px 0; text-align:center; min-height:300px;">

<form role="search" method="get" id="search-box" action="http://www.scottsdalebible.com/" >
	<div id="searchform">
	<input type="text" value="Search" onclick="this.value='';" name="s" id="s"  class="query" style="border:1px solid #ccc; border-radius:3px;"/>
	<input type="submit" id="searchsubmit" value="Search" class="btn_search" />
	</div>
	</form>
</div>

	<?php the_content(); ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
</div><!-- End content -->
<div class="clear"></div>
<?php endwhile; endif; ?>
</article>


</div><!-- end main_content -->


</div><!-- end page content container -->
<?php get_footer(); ?>
