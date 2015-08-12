<?php if(!isset($wp)) { return; } ?>

<?php if($location=get_field('map_location')) { ?>

<section class="location-map">
    <div class="map-container" data-key="<?php echo GOOGLE_API_KEY; ?>" data-height="500" data-zoom="11" data-lat="<?php echo round($location['lat'],3); ?>" data-lng="<?php echo round($location['lng'],3); ?>">
        <div class="map-location" data-lat="<?php echo round($location['lat'],3); ?>" data-lng="<?php echo round($location['lng'],3); ?>">
        </div>
    </div>
</section>
<?php } ?>