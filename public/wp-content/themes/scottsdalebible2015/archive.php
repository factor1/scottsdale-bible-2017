<?php

get_header();

?>
<section class="posts-archive">
    <?php if(have_posts()) { ?>
    <?php get_template_part("components/posts/archive-list"); ?>
    <?php } else { ?>
    <div class="row">
        <h2>No posts found</h2>
    </div>
    <?php } ?>
</section>
<?php

get_footer();