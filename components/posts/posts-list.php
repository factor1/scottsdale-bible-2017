<section class="news-and-stories">
    <h1><?php echo is_post_type_archive('devotion') ? 'Devotions' : 'Blog'; ?></h1>
    <div class="row">
        <ul class="small-block-grid-1 medium-block-grid-3">
            <?php while(have_posts()) { the_post(); //$story = get_post();
              //$image = get_field("featured_image",$story->ID);

              $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium'); ?>

              <li>
                <a href="<?php the_permalink(); ?>">
                  <div>
                      <div>
                          <?php if($image) { ?>
                          	<img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" />
                          <?php } ?>
                      </div>
                      <div>
                          <h3><?php the_title(); ?></h3>

                      </div>
                  </div>
                </a>
              </li>
            <?php } ?>
        </ul>
    </div>
    <?php get_template_part("components/posts/nav"); ?>
</section>
