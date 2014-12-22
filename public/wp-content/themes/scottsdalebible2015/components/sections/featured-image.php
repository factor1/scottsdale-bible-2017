<?php if(!isset($wp)) { return; } ?>

<?php if($video=get_field("featured_video")) { ?>
<section class="featured-video">
    <div class="row">
        <div class="large-12 columns">
            <div class="fluidMedia">
                <?php echo preg_replace("#(width|height)=(\"|\')[0-9]+(\"|\')#ismu"," ",$video); ?>
            </div>
        </div>
    </div>
</section>
<?php return; } ?>

<?php if($image=get_field("featured_image")) { ?>
<section class="featured-image">
    <div class="row">
        <div class="large-12 columns">
            <img src="<?php echo esc_attr($image['url']); ?>" alt="" title="" />
        </div>
    </div>
</section>
<?php } ?>