<?php if( get_field('hero_type') == 'image' ) : 

  $img = wp_get_attachment_image_src(get_field('hero_background_image'), 'small_hero');
  $content = get_field('hero_content'); ?>

  <section class="image-hero" style="background: url('<?php echo $img[0]; ?>') center/cover no-repeat">
    <div class="row">
      <div class="large-12 columns">

        <?php echo $content; 
        
        if( have_rows('hero_buttons') ) : ?>

          <div class="text-center">

            <?php while( have_rows('hero_buttons') ) : the_row();
              $btn = get_sub_field('button'); ?>

              <a href="<?php echo esc_url($btn['url']); ?>" class="button-white" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                <?php echo $btn['title']; ?>
              </a>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>
    </div>
  </section>

<?php endif; ?>