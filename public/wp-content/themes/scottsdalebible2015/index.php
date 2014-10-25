<?php

get_header();

?>

<?php if(have_posts()) { ?>
    <?php while(have_posts()) { the_post(); ?>
        <section>
            <h1><?php the_title(); ?></h1>
        </section>
        <section>
            <div class="row">
                    <div class="small-12 medium-11 medium-centered columns">
                     <?php get_template_part("components/posts/meta.php"); ?>
                     <?php echo sb_get_the_content(); ?>
                    </div>
            </div>
        </section>
    <?php } ?>
<?php } else { ?>
    <section>
        <h2>Not Found</h2>
    </section>
<?php } ?>

<?php

get_footer();