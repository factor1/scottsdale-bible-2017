<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$news_post_id = (get_field("use_homepage_news")) ? sb_get_homepage_post_id() : $post->ID;

$news_posts = get_field("news_and_stories",$news_post_id);

if(!$news_posts) {
    return;
}

?>
<section class="news-and-stories">
    <h1>News <span>and</span> Stories</h1>
    <div class="row">
        <ul class="small-block-grid-1 large-block-grid-3">
            <?php foreach($news_posts as $story) { $story =& $story['news_story']; $image = get_field("featured_image",$story->ID); ?>
              <li>
                <a href="<?php echo get_permalink($story->ID); ?>">
                <div>
                    <div>
                        <?php if($image) { ?>
                        <img src="<?php echo esc_attr($image['sizes']['medium']); ?>" alt="" title="" />
                        <?php } ?>
                    </div>
                    <div>
                        <h3><?php echo esc_html($story->post_title); ?></h3>

                        <p>
                            <?php echo esc_html(get_field("story_subtitle",$story->ID)); ?>
                        </p>
                    </div>
                </div>
                </a>
              </li>
            <?php } ?>
        </ul>
    </div>
    <div class="row">
        <a href="<?php echo get_option('siteurl'); ?>/news/" class="button-second">View <span>all</span> stories</a>
    </div>
</section>
