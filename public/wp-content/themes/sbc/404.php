<?php get_header(); ?>

<div class="page clearfix">
<div class="main_content wide clearfix">

<div class="notfound">
		<h2>Error 404 - Not Found</h2>
		Oopps, it seems as though we can't find the page you're looking for. Try visiting our <a href="http://www.scottsdalebible.com">home page</a>.
		
		
		
		
</div>

<?php wp_nav_menu( array( 'container_class' => 'menu-404', 'theme_location' => 'primary' ) ); ?>


</div>
</div>
<?php get_footer(); ?>