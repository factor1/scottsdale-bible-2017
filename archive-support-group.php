<?php 
/*
 * Support Group CPT archive 
 */

get_header(); 

get_template_part("components/sections/featured-image"); ?>

<section class="callout3">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <?php the_field('support_groups_intro_copy', 'option'); ?>
    </div>
  </div>
  <div class="row">
  </div>
</section>

<?php if( have_posts() ) : ?>

  <section class="groups-list">
    <div class="row">

      <?php while( have_posts() ) : the_post();
        $id = get_the_ID();
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'support_group');
        $endClass = '';
        if (!get_next_post_link()) { 
          $endClass = ' end'; 
        }
        ?>

        <div class="small-12 medium-6 large-4 columns <?php echo $endClass; ?>">
          <a data-remodal-target="group-<?php echo $id; ?>" class="groups-list__item" data-remodal-options="hashTracking: false">
            <div class="groups-list__img" style="background: url('<?php echo $img[0]; ?>') center/cover no-repeat"></div>
          </a>
        </div>

      <?php endwhile; ?>
    
    </div>
  </section>

  <?php while( have_posts() ) : the_post(); 
    $id = get_the_ID(); ?>

    <div class="remodal remodal--group" data-remodal-id="group-<?php echo $id; ?>">
      <h1><?php the_title(); ?></h1>
    
      <?php the_content(); ?>
    </div>

  <?php endwhile;

endif;

get_footer(); ?>