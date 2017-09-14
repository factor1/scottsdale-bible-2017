<?php if(!isset($wp)) { return; } ?>

<?php if( have_rows ('flexible-content') ): ?>
<section class="flexible-content">

<?php

		// loop through all the rows of flexible content
		while ( have_rows('home_page_content') ) : the_row();

		// Callout 1
		if( get_row_layout() == 'callout_1' )
			get_template_part('partials/stripe', 'callout-1');

		// Callout 2
		if( get_row_layout() == 'callout_2' )
			get_template_part('partials/stripe', 'callout-2');

		// Callout 3
		if( get_row_layout() == 'callout_3' )
			get_template_part('partials/stripe', 'callout-3');

		// Callout 4
		if( get_row_layout() == 'callout_4' )
			get_template_part('partials/stripe', 'callout-4');

		// General Info
		if( get_row_layout() == 'general_info' )
			get_template_part('partials/stripe', 'general-info');

		endwhile; // close the loop of flexible content
?>

</section>
<?php endif; // close flexible content conditional ?>
