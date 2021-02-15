<?php

if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$news_post_id = (get_field("use_homepage_news")) ? sb_get_homepage_post_id() : $post->ID;

$isDefault = is_page() && !is_page_template();

$headline = $isDefault ? get_sub_field('headline') : get_field('home_stories_headline', $news_post_id);
$stories = $isDefault ? get_sub_field('posts') : get_field('home_stories', $news_post_id);

if( $stories ) : ?>

  <section class="posts-list--alternate">
    <h1><?php echo $headline; ?></h1>
    <div class="row">
      <ul class="small-block-grid-2 large-block-grid-3">

        <?php foreach( $stories as $post ) :
          setup_postdata($post);

          $img = get_field("featured_image"); 
          $subtitle = get_post_type() == 'sb_news_story' ? get_field('story_subtitle') : get_field('subtitle'); ?>

              <li>
                <a href="<?php the_permalink(); ?>" class="posts-list--alternate__tile">
                  <div style="background: url('<?php echo $img['sizes']['event_home']; ?>') center/cover no-repeat">
                    <div>
                      <p><?php echo custom_excerpt(20, $subtitle); ?></p>
                    </div>
                  </div>

                  <?php /* <h3><?php the_title(); ?></h3> */ ?>
                </a>
              </li>

        <?php endforeach; wp_reset_postdata(); ?>

      </ul>
    </div>

    <?php if( !$isDefault ) : ?>
      <div class="row" style="margin: 50px auto; text-align: center">
          <a href="<?php echo get_option('siteurl'); ?>/news/" class="button-white">View <span>all</span> stories</a>
          <a href="<?php echo get_option('siteurl'); ?>/blog/" class="button-white">View <span>the</span> blog</a>
      </div>
    <?php endif; ?>
  </section>

<?php endif; ?>
