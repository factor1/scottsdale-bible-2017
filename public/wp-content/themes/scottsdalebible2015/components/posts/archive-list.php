<?php get_template_part("components/posts/nav"); ?>
<?php while(have_posts()) { the_post(); ?>
    <div class="row">
        <div class="small-12">
            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php get_template_part("components/posts/meta"); ?>
            <?php the_excerpt(); ?>
        </div>
    </div>
<?php } ?>
<?php get_template_part("components/posts/nav"); ?>