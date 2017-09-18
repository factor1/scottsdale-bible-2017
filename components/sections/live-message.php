<?php if(!isset($wp)) { return; } ?>

<section class="live-message">
    <div class="row">
        <div class="large-12 columns text-center">
          <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row">
      <div class="large-12">
          <?php echo ($c=sb_get_content_field("page_content")) ? $c : sb_get_the_content(); ?>
      </div>
    </div>
</section>
