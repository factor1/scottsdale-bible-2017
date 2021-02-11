<?php if(!isset($wp)) { return; }

$page = get_queried_object();  $field_value = get_field('page_field',$page->ID);
$page_id = get_queried_object_id();

?>

<?php if( have_rows('flexible_content', $page_id) ): ?>
<section class="flexible-content">

<?php

		// loop through all the rows of flexible content
		while ( have_rows('flexible_content', $page_id) ) : the_row();

		// Callout 1
		if( get_row_layout() == 'callout_1' ) {
			get_template_part('components/partials/stripe', 'callout1');
    };

		// Callout 2
		if( get_row_layout() == 'callout_2' ) {
			get_template_part('components/partials/stripe', 'callout2');
    };
		// Callout 3
		if( get_row_layout() == 'callout_3' ) {
			get_template_part('components/partials/stripe', 'callout3');
    };
		// Callout 4
		if( get_row_layout() == 'callout_4' ) {
			get_template_part('components/partials/stripe', 'callout4');
    };
		// Horizontal Line
		if( get_row_layout() == 'horizontal_line' ) {
			get_template_part('components/partials/stripe', 'horizontalline');
    };
		// General Info
		if( get_row_layout() == 'general_info' ) {
			get_template_part('components/partials/stripe', 'general-info');
    };
		// Full Width Video
		if( get_row_layout() == 'full_width_video' ) {
			get_template_part('components/partials/stripe', 'video');
    };
		// Upcoming Events
		if( get_row_layout() == 'related_events' ) {
			get_template_part("components/sections/related-events");
    };
		// Large Hero Image
		if( get_row_layout() == 'large_hero' ) {
			get_template_part("components/sections/large-hero.php");
    };
		// Blog section
		if( get_row_layout() == 'blog_section' ) {
			get_template_part("components/sections/blog-section-alternate");
		};
		// Single map section
		if( get_row_layout() == 'single_campus_video' ) {
			get_template_part("components/sections/single-location-map");
		};
		// Parallax Section
		if( get_row_layout() == 'parallax_section' ) {
			get_template_part("components/sections/parallax-section");
		};
		endwhile; // close the loop of flexible content

else : // no layouts found

?>
<?php endif; // close flexible content conditional ?>
</section>
