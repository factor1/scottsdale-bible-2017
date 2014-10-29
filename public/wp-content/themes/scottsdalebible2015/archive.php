<?php

get_header();

?>
<section class="posts-archive">
    <?php if(have_posts()) { ?>
    <div class="row">
        <?php get_template_part("components/posts/nav"); ?>
    </div>
    <?php while(have_posts()) { the_post(); ?>
    <div class="row">
        <div class="small-12">
            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php get_template_part("components/posts/meta"); ?>
            <?php the_excerpt(); ?>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <?php get_template_part("components/posts/nav"); ?>
    </div>
    <?php } else { ?>
    <div class="row">
        <h2>No posts found</h2>
    </div>
    <?php } ?>
</section>
<?php

get_footer();