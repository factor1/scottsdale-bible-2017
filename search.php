<?php

get_header();

?>
<section class="posts-archive search-results">
    <?php if(have_posts()) { ?>
    <div class="row">
        <h2>Search Results</h2>
    </div>
    <?php get_template_part("components/posts/search-list"); ?>
    <?php } else { ?>
    <div class="row">
        <h2>No results found</h2>
    </div>
    <?php } ?>
</section>
<?php

get_footer();