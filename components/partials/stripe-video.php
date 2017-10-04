<?php if(!isset($wp)) { return; }

//vars
$video = get_sub_field('video');

?>
<?php if($video) { ?>
<section class="stripe-video">
    <div class="row fullWidth">
        <div class="fluidMedia">
            <?php echo preg_replace("#(width|height)=(\"|\')[0-9]+(\"|\')#ismu"," ",$video); ?>
        </div>
    </div>
</section>
<?php return; } ?>
