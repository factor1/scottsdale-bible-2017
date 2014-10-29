<?php

get_header();

?>
<section class="posts-archive">
    <div class="row">
        <h2>News and Stories</h2>
    </div>
    <?php if(have_posts()) { ?>
    <?php get_template_part("components/posts/archive-list"); ?>
    <?php } else { ?>
    <div class="row">
        <h3>No posts found</h3>
    </div>
    <?php } ?>
</section>
<?php

get_footer();