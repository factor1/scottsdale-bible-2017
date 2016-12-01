<?php
/* Template Name: Winter Wonder Program Crew */
get_header();
get_template_part("components/sections/featured-image");
?>

<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/winterwonder.css">

<div class="winterwonder"> 
	
<?php if(!isset($wp)) { return; }

$sidebar_menus = sb_get_sidebar_menus();
$sidebar_content = sb_get_sidebar_content();
$show_sidebar = $sidebar_menus || $sidebar_content;

?>
 
 
<div class="row">
 <?php if($show_sidebar) { ?>
        <div class="large-3 columns sidebar">
            <?php foreach($sidebar_menus as $menu_title => $menu) { ?>
                <h3><?php echo esc_html($menu_title); ?></h3>
                <?php echo $menu; ?>
            <?php } ?>
            <?php if($sidebar_content) { ?>
            <div>
                <?php echo $sidebar_content; ?>
            </div>
            <?php } ?>
        </div>
        <div class="large-9 columns">
        <?php } else { ?>
        <div class="small-12 columns">
        <?php } ?>
        <h2>Production Team</h2>

			
			<ul class="small-block-grid-1 medium-block-grid-4">
				<?php
				global $post;
				$args = array( 
						'numberposts' 				=> -1, 
						'post_type'              	=> 'f1_staffgrid_cpt',	
						'f1_staffgrid_tax' 			=> 'production-crew', // Department Taxonomy (per site).
						'meta_key' 					=> 'last_name',
						'orderby'					=> 'meta_value', 
						//'post__in' 				=> array( 2, 5, 12, 14, 20 );,  // Use ID's in an array for specific ordering.
						'order' 						=> 'ASC'
						);
	
				$staffgrid = get_posts( $args );
				foreach( $staffgrid as $post ) :	setup_postdata($post); ?>
				
				<li>
					<a data-remodal-target="modal-<?php the_ID(); ?>" style="text-align:center">
						<!-- Photo -->
						<div class="f1_mentor_photo_container">
							<?php if(has_post_thumbnail()) {
								the_post_thumbnail('staff_grid');
								} else {	}
							?>
						</div>
						
						<div class="f1_mentor_summary_name"><strong><?php the_field( "first_name" ); ?>&nbsp;<?php the_field( "last_name" ); ?></strong></div>
						<div class="f1_mentor_summary_title"><small><?php if(get_field( "title" )) : the_field( "title" ); endif; ?></small></div>
					</a>
					<!-- Remodal -->
				<div class="remodal" data-remodal-id="modal-<?php the_ID();?>">
					<div class="row">
						<div class="medium-4 columns">
							<div class="f1_mentor_details_photo_container">
								<?php if(has_post_thumbnail()) {
									the_post_thumbnail();
								} else {	}
								?>
							</div>

							<div class="f1_mentor_details_social_container">
								<?php if(get_field( "phone" )) : echo('Phone: '); the_field( "phone" ); endif; ?></br>
								<?php if(get_field( "email_address" )) : echo('<a href="mailto:'); the_field( "email_address"); echo('">Email '); the_field( "first_name" ); echo('</a></br>'); endif; ?>

								<?php if(get_field( "twitter_url" )) : echo('<a href="'); the_field( "twitter_url" ); echo('">Twitter</a>');  endif; ?>
								<?php if(get_field( "facebook_url" )) : echo('<a href="'); the_field( "facebook_url" ); echo('">Facebook</a>');  endif; ?>
								<?php if(get_field( "linkedin_irl" )) : echo('<a href="'); the_field( "linkedin_url" ); echo('">LinkedIn</a>');  endif; ?>
								<?php if(get_field( "instagram_url" )) : echo('<a href="'); the_field( "instagram_url" ); echo('">Instagram</a>');  endif; ?>
							</div>
						</div>

						<div class="medium-8 columns">
							<p class="f1_mentor_details_name"><strong><?php the_field( "first_name" ); ?>&nbsp;<?php the_field( "last_name" ); ?></strong></br>
							<span class="f1_mentor_summary_title"><small>	<?php if(get_field( "title" )) : the_field( "title" ); endif; ?></small></span></p>

							<div class="f1_mentor_details_bio">
								<?php if(get_field( "staff_bio" )) : the_field( "staff_bio" ); endif; ?>
							</div>
						</div>
					</div>
				</div>
				</li>
				
				
				
				<?php endforeach; wp_reset_postdata();?>
			</ul>
			
		</div>
	</div>

</div>
 
 


</div>

<?php get_footer();?>