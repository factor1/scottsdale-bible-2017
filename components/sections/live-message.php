<?php if(!isset($wp)) { return; } ?>

<section class="live-message">
    <div class="row">
        <div class="large-12 columns text-center">
          <h1><?php the_title(); ?></h1>
        </div>
    </div>
</section>
<section class="featured-video">
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
