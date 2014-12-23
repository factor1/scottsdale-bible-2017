<?php 

/* The template for displaying Search Results pages. */
 
get_header(); ?>



<div class="page clearfix">

<div class="main_content clearfix">

<article class="clearfix">

<?php if ( have_posts() ) : ?>
<div class="titlebar">
	<h1><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<!-- div class="social button">Share</div>
	<div class="social_tools">Coming soon	</div -->
</div>


<div class='content'>



		


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php the_title(); ?></a></h2>
				
			<div class="entry-summary" style="border-bottom:1px solid #ccc; padding-bottom:15px; display:block; margin-bottom:30px;">
			<?php the_excerpt(); ?>
			
			<a href="<?php the_permalink(); ?>" rel="bookmark" class="btn_search">Continue reading <?php the_title(); ?></a>
		</div><!-- .entry-summary -->


				<?php endwhile; ?>


			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>


	
</div><!-- End content -->
<div class="clear"></div>

</article>


</div><!-- end main_content -->

<?php get_sidebar('page'); ?>

</div><!-- end page content container -->
<?php get_footer(); ?>
