<?php // Parallax Section

$img = wp_get_attachment_image_src(get_sub_field('background_image'), 'parallax');
$content = get_sub_field('content');
$btn = get_sub_field('button'); ?>

<div class="g-sm-only">
  <section class="upcoming-message no-parallax" style="background: url(<?php echo $img[0]; ?>) center/cover;">
    <div>
      <?php echo $content;

      // Optional button
      if( $btn ) : ?>
        <a href="<?php echo $btn['url']; ?>" class="button" data-target="new-window"><?php echo $btn['title']; ?></a>
      <?php endif; ?>
    </div>
  </section>
</div>

<div class="g-sm-none">
  <section class="upcoming-message" data-parallax="scroll" data-image-src="<?php echo $img[0]; ?>">
    <div>
      <?php echo $content;

      // Optional button
      if( $btn ) : ?>
        <a href="<?php echo $btn['url']; ?>" class="button" data-target="new-window"><?php echo $btn['title']; ?></a>
      <?php endif; ?>
    </div>
  </section>
</div>
