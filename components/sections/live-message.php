<?php if(!isset($wp)) { return; } ?>

<section class="featured-video live-message">
    <div class="text-center">
      <h1><?php the_title(); ?></h1>
    </div><br><br><br><br><br><br><br><br>
    <?php if($video=get_field("featured_video")) { ?>
    <div class="row">
        <div class="large-12 columns">
            <div class="fluidMedia">
                <?php echo preg_replace("#(width|height)=(\"|\')[0-9]+(\"|\')#ismu"," ",$video); ?>
            </div>
        </div>
    </div>

</section>
<?php return; } ?>
