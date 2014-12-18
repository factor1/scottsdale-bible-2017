<?php if(!isset($wp)) { return; } ?>

<section class="article">
    <?php if(!get_field("hide_titlebar")) { ?>
    <h1><?php echo get_the_title(); ?></h1>
    <?php } ?>
    <div>
        <?php if(!get_field("hide_social_links")) { ?>
        <ul class="inline-list">
            <li>
                <a href="#" data-trigger-click="st_facebook_large"><i class="fa fa-facebook-square"></i>Share this post on Facebook</a>
            </li>
            <li>
                <a href="#" data-trigger-click="st_twitter_large"><i class="fa fa-twitter-square"></i>Tweet about this post</a>
            </li>
            <li>
                <a href="#" data-trigger-click="st_pinterest_large"><i class="fa fa-pinterest-square"></i>Pin this post</a>
            </li>
        </ul>
        <?php } ?>
    </div>
    <div>
        <?php echo ($c=sb_get_content_field("page_content")) ? $c : sb_get_the_content(); ?>
    </div>
</section>