<?php

get_header();

?>

<?php if(have_posts()) { ?>
<?php get_template_part("components/posts/news-stories-list"); ?>
<?php } else { ?>
<section class="posts-archive">
    <div class="row">
        <h3>No news found</h3>
    </div>
</section>
<?php } ?>

<?php

get_footer();