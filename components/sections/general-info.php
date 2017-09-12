<?php if(!isset($wp)) { return; } ?>
<?php if( have_rows ('general_info') ) : the_row() ?>
<section class="general-info">
    <div class="row">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
            <?php if( have_rows ('info_blocks') ): ?>
              <?php while ( have_rows('info_blocks') ) : the_row();

              // vars
              $image = get_sub_field('image');
              $title = get_sub_field('title');
              $text_area = get_sub_field('text');

              ?>
              <li>
                  <div class="row">
                      <div class="medium-12 columns box-section" id="card" style="background-image: url(<?php echo esc_attr($image['sizes']['large']); ?>);">
                          <div class="box-section-text front">
                              <h2 class="front"><?php echo $title ?></h2>
                          </div>
                          <div class="box-section-text back">
                              <h2><?php echo $title ?></h2>
                          </div>
                      </div>
                  </div>
              </li>
              <?php endwhile; ?>
            <?php endif;  ?>
        </ul>
    </div>
</section>
<?php endif;  ?>
