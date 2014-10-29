<?php if(!isset($wp)) { return; }

$news_posts = get_field("news_and_stories");

if(!$news_posts) {
    return;
}

?>
<section class="news-and-stories">
    <h1><i class="fa fa-news-and-stories"></i>News <span>and</span> Stories</h1>
    <div class="row">
        <ul class="large-block-grid-3">
            <?php foreach($news_posts as $post) { $post =& $post['news_story']; $image = get_field("featured_image",$post->ID); ?>
            <li>
                <div>
                    <div>
                        <?php if($image) { ?>
                        <img src="<?php echo esc_attr($image['sizes']['medium']); ?>" alt="" title="" />
                        <?php } ?>
                    </div>
                    <div>
                        <h3><a href="#"><?php echo esc_html($post->post_title); ?></a></h3>
                        <a href="#"><i class="fa fa-thin-chevron-right"></i></a>
                        <p>
                            <?php echo esc_html(get_field("story_subtitle",$post->ID)); ?>
                        </p>
                    </div>
                </div>
            </li>
            <?php } ?>

            <?php /* ?>
            <li>
                <div>
                    <div>
                        <img src="http://placehold.it/340x230" alt="" title="" />
                    </div>
                    <div>
                        <h3><a href="#">CHECK OUT OUR NEW CAMPUS!</a></h3>
                        <a href="#"><i class="fa fa-thin-chevron-right"></i></a>
                        <p>
                            Our Sunday service times are 9 and 10:45am.<br />
                            We look forward to worshipping with you
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <div>
                        <img src="http://placehold.it/340x230" alt="" title="" />
                    </div>
                    <div>
                        <h3><a href="#">CHECK OUT OUR NEW CAMPUS!</a></h3>
                        <a href="#"><i class="fa fa-thin-chevron-right"></i></a>
                        <p>
                            Our Sunday service times are 9 and 10:45am.<br />
                            We look forward to worshipping with you
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <div>
                        <img src="http://placehold.it/340x230" alt="" title="" />
                    </div>
                    <div>
                        <h3><a href="#">CHECK OUT OUR NEW CAMPUS!</a></h3>
                        <a href="#"><i class="fa fa-thin-chevron-right"></i></a>
                        <p>
                            Our Sunday service times are 9 and 10:45am.<br />
                            We look forward to worshipping with you
                        </p>
                    </div>
                </div>
            </li>
            <?php */ ?>

        </ul>
    </div>
    <div class="row">
        <a href="#" class="button dark-brown">View <span>all</span> stories</a>
    </div>
</section>