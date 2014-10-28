<?php

if(function_exists("register_nav_menus"))
{

    register_nav_menus([
        'header_mega_menu' => 'Header Mega Menu',
        'footer_menu' => 'Footer Menu'
    ]);

    add_action("widgets_init",function() {

        register_sidebar([
            'name' => __( 'Sidebar', 'f1' ),
            'id' => 'sidebar',
            'description' => __( 'The primary widget area on the right side', 'f1' ),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ]);

    });

}

if(!function_exists("f1_get_nav_menu")) {
    function f1_get_nav_menu($args)
    {
        $defaults = [
            'theme_location'=>'',
            'menu'=>'',
            'container'=>false,
            'container_class'=>'',
            'container_id'=>'',
            'menu_class'=>'',
            'menu_id'=>'',
            'echo'=>false,
            'fallback_cb'=>function() {},
            'before'=>'',
            'after'=>'',
            'link_before'=>'',
            'link_after'=>'',
            'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'=>0,
            'walker'=>''
        ];
        return wp_nav_menu(array_merge($defaults,$args));
    }
}
if(!function_exists(THEME_PREFIX."get_nav_menu"))
{
    eval("function ".THEME_PREFIX."get_nav_menu(\$args) { return f1_get_nav_menu(\$args); }");
}