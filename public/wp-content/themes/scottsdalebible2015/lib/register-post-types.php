<?php

Use factor1\CustomPostType;
Use factor1\MetaBox;

if(!function_exists("f1_register_custom_post_types"))
{
    function f1_register_custom_post_types()
    {

        /* Campuses */
        $pt = new CustomPostType("Campus",[],THEME_PREFIX);
        $pt
            ->setPermalinks("/campuses/%postname%/")
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