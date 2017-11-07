<?php

get_header();

?>
<?php if($image=get_field("featured_image",sb_get_eventspage_post_id())) { ?>
<section class="featured-image">
    <div class="row">
        <div class="large-12 columns">
            <img src="<?php echo esc_attr($image['url']); ?>" alt="" title="" />
        </div>
    </div>
</section>
<?php } ?>
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