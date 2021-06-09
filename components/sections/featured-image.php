<?php if(!isset($wp)) { return; } 

$suffix = is_post_type_archive('support-group') ? 'option' : ''; ?>

<?php if( !is_post_type_archive('support-group') && $video=get_field("featured_video")) { ?>
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

<?php if($image=get_field("featured_image", $suffix)) { ?>
<section class="featured-image" style="background: url(<?php echo esc_attr($image['sizes']['featured-image']); ?>) center center">
    <div class="row fullWidth">
        <div class="large-12 columns" >

            <meta property="og:image" content="<?php echo esc_attr($image['url']); ?>">
            <div class="row">
              <div class="small-12 columns feature-text">
                <?php if($text=get_field("featured_image_text", $suffix)) { ?>
                <?php echo $text ; ?>
                <?php } ?>
              </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
