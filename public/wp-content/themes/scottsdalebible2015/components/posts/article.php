<?php if(!isset($wp)) { return; } ?>

<section class="article">
    <h1><?php echo get_the_title(); ?></h1>
    <div>
        <ul class="inline-list">
            <li>
                <a href="#"><i class="fa fa-facebook-square"></i>Share this post on Facebook</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter-square"></i>Tweet about this post</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-pinterest-square"></i>Pin this post</a>
            </li>
        </ul>
    </div>
    <div>
        <?php echo ($c=sb_get_content_field("page_content")) ? $c : get_the_content(); ?>
        <div class="corecontent">
        	<?php the_content();?>
        </div>
    </div>
</section>