<?php
/*
 * Template Name: Holiday Landing Page
 * Description: Page template for 2018 Holiday Landing Page
 */

get_header();

if( have_rows('flexible_content') ) : while( have_rows('flexible_content') ) : the_row();

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
if( get_row_layout() == 'large_landing_hero' ) {
  get_template_part("components/sections/large-landing-hero");
  get_template_part("components/sections/landing-nav");
};
// Small Hero Image
if( get_row_layout() == 'small_landing_hero' ) {
  get_template_part("components/sections/small-landing-hero");
  get_template_part("components/sections/landing-nav");
};
// Landing Nav
if( get_row_layout() == 'landing_nav' ) {
  get_template_part("components/sections/landing-nav");
};
// Two Button Block
if( get_row_layout() == 'two_button_block' ) {
  get_template_part("components/sections/two-button-block");
};
// Event Block
if( get_row_layout() == 'landing_event_block' ) {
  get_template_part("components/sections/landing-event-block");
};
// Event Block
if( get_row_layout() == 'video_hero_block' ) {
  get_template_part("components/sections/home-hero");
};

endwhile; endif;

get_footer();
