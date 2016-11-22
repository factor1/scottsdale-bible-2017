<?php
/* Template Name: Winter Wonder Program Crew */
get_header();
get_template_part("components/sections/featured-image");
?>

<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/winterwonder.css">

<div class="winterwonder"> 
 
 
<div class="row">
	<h2>Production Crew</h2>
	
	<div class="row">
		<div class="medium-9 medium-centered columns">
			
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
								the_post_thumbnail('medium');
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
 
 


<div class="row">
	<h2> Christmas Giving Project </h2>
	
	<div class="medium-9 medium-centered columns">
		<h3></h3>
		
		<p>Each year at Winter Wonder, we choose an opportunity to meet a specific need in our community and extend generosity in Christ’s name. This year, we’re adopting four Title 1 schools in Scottsdale (Hohokam, Navajo, Tavan & Yavapai) and partnering with Healthy Packs and Concerned Citizens for Community Health to help children experiencing weekend hunger. The Healthy Packs program provides a $4-6 pack of nutritious food to sustain a child from Friday evening through Sunday. We plan to fully fund the program at these four schools for the ’15/’16 school year.</p>
		
		<p><a href="http://ccch.azurewebsites.net/programs/healthy-packs" target="_blank">Learn more about the Healthy Packs Program here.</a> This <a href="http://www.azcentral.com/story/news/local/scottsdale/2014/09/25/scottsdale-schools-healthy-packs-feed-kids/16208929/?from=global&sessionKey=&autologin=" target="_blank">AZ Central article</a> shares more about the impact of this program on Scottsdale kids.</p>
		
		<p>In addition to funding the Healthy Packs program, we will also provide Christmas stockings for approximately 1,500 children and gifts for teachers and staff at three of these schools. Gifts will be presented at surprise assemblies on December 17, 2015. Our vision is to share Christ’s love and build lasting relationships at each of these schools.</p>
		
		<p>If you would like to participate in supporting this project, <a href="https://scottsdalebible.onlinegiving.cc/donate/login" target="_blank">you may give online here.</a> You may also give by texting “give” to 480.771.1722 or via check to Scottsdale Bible Church.  Thank you for your generosity toward this effort!</p>

	</div>
</div>


<div class="row centered">
	<p class="italictext winterfoot"> Are you interested in being part of Winter Wonder 2016? Email <a href="mailto:worship@scottsdalebible.com">worship@scottsdalebible.com</a> and indicate your area of experience/interest. </p>
</div>

</div>

<?php get_footer();?>