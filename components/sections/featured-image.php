<?php if(!isset($wp)) { return; } ?>

<?php if($video=get_field("featured_video")) { ?>
<section class="featured-video">
    <div class="row fullWidth">
        <div class="large-12 columns">
            <div class="fluidMedia">
                <?php echo preg_replace("#(width|height)=(\"|\')[0-9]+(\"|\')#ismu"," ",$video); ?>
            </div>
        </div>
    </div>
</section>
<?php return; } ?>

<?php if($image=get_field("featured_image")) { ?>
<section class="featured-image" style="background: url(<?php echo esc_attr($image['sizes']['large']); ?>)">
    <div class="row fullWidth">
        <div class="large-12 columns" >

            <meta property="og:image" content="<?php echo esc_attr($image['url']); ?>">
        </div>
    </div>
</section>
<?php } ?>
