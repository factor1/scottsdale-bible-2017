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