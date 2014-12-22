<section class="news-and-stories">
    <h1><i class="fa fa-news-and-stories"></i>News <span>and</span> Stories</h1>
    <div class="row">
        <ul class="small-block-grid-1 medium-block-grid-3">
            <?php while(have_posts()) { the_post(); $story = get_post(); $image = get_field("featured_image",$story->ID); ?>
            <li>
                <div>
                    <div>
                        <?php if($image) { ?>
                        <img src="<?php echo esc_attr($image['sizes']['medium']); ?>" alt="" title="" />
                        <?php } ?>
                    </div>
                    <div>
                        <h3><a href="<?php echo get_permalink($story->ID); ?>"><?php echo esc_html($story->post_title); ?></a></h3>
                        <a href="<?php echo get_permalink($story->ID); ?>"><i class="fa fa-thin-chevron-right"></i></a>
                        <p>
                            <?php echo esc_html(get_field("story_subtitle",$story->ID)); ?>
                        </p>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php get_template_part("components/posts/nav"); ?>
</section>