<?php
/*
Template Name: Events List
*/

get_header();
get_template_part("components/sections/featured-image");

$wp_query = new WP_Query([
    'post_type'=>'event',
    'post_per_page'=>30
]);

?>
<?php if(have_posts()) { ?>
<?php get_template_part("components/posts/events-list"); ?>
<?php } else { ?>
<section class="posts-archive">
    <div class="row">
        <h3>No events found</h3>
    </div>
</section>
<?php } ?>
<?php

get_footer();