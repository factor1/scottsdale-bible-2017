<?php

get_header();

?>

<?php if(have_posts()) { ?>

    <?php get_template_part("components/posts/posts-list"); ?>

<?php } else { ?>
    <section>
        <h2>Not Found</h2>
    </section>
<?php } ?>

<?php

get_footer();
