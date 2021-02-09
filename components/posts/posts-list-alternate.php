<section class="posts-list--alternate">
    <h1>Blog</h1>
    <div class="row">
        <ul class="small-block-grid-2 large-block-grid-3">
            <?php while(have_posts()) { the_post(); 

              $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'event_home'); ?>

              <li>
                <a href="<?php the_permalink(); ?>" class="posts-list--alternate__tile">
                  <div style="background: url('<?php echo $image[0]; ?>') center/cover no-repeat">
                    <div>
                      <p><?php echo custom_excerpt(15); ?></p>
                    </div>
                  </div>

                  <h3><?php the_title(); ?></h3>
                </a>
              </li>
            <?php } ?>
        </ul>
    </div>
    <?php get_template_part("components/posts/nav"); ?>
</section>
