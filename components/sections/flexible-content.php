<?php if(!isset($wp)) { return; } ?>

<?php if( have_rows('flexible_content', 198) ): ?>
<section class="flexible-content">

<?php

		// loop through all the rows of flexible content
		while ( have_rows('flexible_content', 198) ) : the_row();

		// Callout 1
		if( get_row_layout() == 'callout_1' ) {
			get_template_part('partials/stripe', 'callout1');
    };

		// Callout 2
		if( get_row_layout() == 'callout_2' ) {
			get_template_part('partials/stripe', 'callout2');
    };
		// Callout 3
		if( get_row_layout() == 'callout_3' ) {
			get_template_part('partials/stripe', 'callout3');
    };
		// Callout 4
		if( get_row_layout() == 'callout_4' ) {
			get_template_part('partials/stripe', 'callout4');
    };
		// General Info
		if( get_row_layout() == 'general_info' ) {
			get_template_part('partials/stripe', 'general-info');
    };
		endwhile; // close the loop of flexible content

else : // no layouts found
  echo "Not Found";
?>
<?php endif; // close flexible content conditional ?>
</section>
