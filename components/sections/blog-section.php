<?php

$stories = get_sub_field('posts');

if( $stories ) : ?>

  <section class="news-and-stories">
    <h1><?php the_sub_field('headline'); ?></h1>
    <div class="row">
      <ul class="small-block-grid-1 large-block-grid-3">

        <?php foreach( $stories as $post ) :
          setup_postdata($post);

          $img = get_field("featured_image"); ?>

            <li>
              <a href="<?php the_permalink(); ?>">
              <div>
                  <div>
                      <?php if($img) { ?>
                        <img src="<?php echo esc_attr($img['sizes']['medium']); ?>" alt="" title="" />
                      <?php } ?>
                  </div>
                  <div>
                      <h3><?php the_title(); ?></h3>
                  </div>
              </div>
              </a>
            </li>

        <?php endforeach; wp_reset_postdata(); ?>

      </ul>
    </div>
  </section>

<?php endif; ?>
