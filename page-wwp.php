<?php
/* Template Name: Winter Wonder Program */
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



<section class="page-content">
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
            <?php
            // Get Post Articles
            get_template_part("components/posts/article");

            // Get Related Events
            //if( get_field('show_related_events') === true ){
              //get_template_part("components/sections/related-events");
            //}
            ?>
        </div>
    </div>
</section>
 
 
</div> 



<?php get_footer();?>


