<?php

Use factor1\CustomPostType;
Use factor1\MetaBox;

if(!function_exists("f1_register_custom_post_types"))
{
    function f1_register_custom_post_types()
    {

        /* Campuses */
        $pt = new CustomPostType("Campus",['exclude_from_search'=>false],THEME_PREFIX);
        $pt
            ->setPermalinks("/campuses/%postname%/")
            ->register()
            ;

        /* Church Groups */
        /*
        $pt = new CustomPostType("Group",['exclude_from_search'=>false],THEME_PREFIX);
        $pt
            ->setPermalinks("/groups/%postname%/")
            ->register()
            ;
        */

        /* News and Stories */
        $pt = new CustomPostType("News Story",[
            'exclude_from_search' => false,
            'rewrite' => [
                'with_front'=>true,
                'feeds'=>true,
                'pages'=>false,
                'ep_mask'=>EP_PERMALINK,
                'slug'=>'news'
            ]
        ],THEME_PREFIX);
        $pt
            ->setPermalinks("/news/%postname%/")
            ->register()
            ;

        if(defined("FLUSH_REWRITE_RULES")&&FLUSH_REWRITE_RULES===true) {
            flush_rewrite_rules();
        }
    }
}

if(!function_exists(THEME_PREFIX."register_custom_post_types"))
{
    /* Called within template init */
    eval("function ".THEME_PREFIX."register_custom_post_types() { return f1_register_custom_post_types(); }");
}

// Register Support Groups Custom Post Type
function support_groups() {

	$labels = array(
		'name'                  => _x( 'Support Groups', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Support Group', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Support Groups', 'text_domain' ),
		'name_admin_bar'        => __( 'Support Groups', 'text_domain' ),
		'archives'              => __( 'Support Group Archives', 'text_domain' ),
		'attributes'            => __( 'Support Group Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Support Group:', 'text_domain' ),
		'all_items'             => __( 'All Support Groups', 'text_domain' ),
		'add_new_item'          => __( 'Add New Support Group', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Support Group', 'text_domain' ),
		'edit_item'             => __( 'Edit Support Group', 'text_domain' ),
		'update_item'           => __( 'Update Support Group', 'text_domain' ),
		'view_item'             => __( 'View Support Group', 'text_domain' ),
		'view_items'            => __( 'View Support Groups', 'text_domain' ),
		'search_items'          => __( 'Search Support Group', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Support Group', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Support Group', 'text_domain' ),
		'items_list'            => __( 'Support Groups list', 'text_domain' ),
		'items_list_navigation' => __( 'Support Groups list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Support Groups list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Support Group', 'text_domain' ),
		'description'           => __( 'Support Groups', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'support-groups',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'support-group', $args );

}
add_action( 'init', 'support_groups', 0 );