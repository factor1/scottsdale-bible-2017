<?php if(!isset($wp)) { return; } ?>
<section class="general-info">
    <div class="row">
      <?php if($headline = get_sub_field('headline')) : ?>
        <h1>
          <?php echo $headline; ?>
        </h1>
      <?php endif; ?>
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3 visit-block">
            <?php if( have_rows ('info_blocks') ): $i = 0 ?>
              <?php while ( have_rows('info_blocks') ) : the_row(); $i++;

              // vars
              $image = get_sub_field('image');
              $title = get_sub_field('title');
              $text_area = get_sub_field('text');

              ?>
              <li>
                  <div class="card" id="card<?php echo $i;?>">
                      <div class="front overlay" style="background-image: url(<?php echo esc_attr($image['sizes']['large']); ?>);">
                          <div class="box-section-text">
                            <?php if($title) : ?>
                              <h2><?php echo $title ?></h2>
                            <?php endif; ?>
                          </div>
                      </div>
                      <div class="back no-overlay">
                          <div class="box-section-text">
                              <p><?php echo $text_area ?></p>
                          </div>
                      </div>
                  </div>
              </li>
              <?php endwhile; ?>
            <?php endif;  ?>
        </ul>
    </div>
</section>
