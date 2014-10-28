<?php if(!isset($wp)) { return; } ?>

<section class="article">
    <h1><?php echo get_the_title(); ?></h1>
    <div>
        <a href="#"><i class="fa fa-facebook-square"></i>Share this post on Facebook</a>
        <a href="#"><i class="fa fa-twitter-square"></i>Tweet about this post</a>
        <a href="#"><i class="fa fa-pinterest-square"></i>Pin this post</a>
    </div>
    <div>
        <?php echo ($c=sb_get_content_field("page_content")) ? $c : get_the_content(); ?>
    </div>
</section>