<?php // Banner Section Custom Fields
$bannerToggle = get_field('home_banner_toggle', sb_get_homepage_post_id());
$banner = get_field('home_banner', sb_get_homepage_post_id());

if( $bannerToggle && $banner ) : ?>

  <section class="banner-section">
    <div class="row">
      <a href="<?php echo esc_url($banner['url']); ?>" class="button" role="link" title="<?php echo $banner['title']; ?>" target="<?php echo $banner['target']; ?>">
        <?php echo $banner['title']; ?>
      </a>

      <button>x</button>
    </div>
  </section>

<?php endif; ?>
