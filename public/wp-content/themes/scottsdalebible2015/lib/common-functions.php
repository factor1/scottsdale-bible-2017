<?php

Use factor1\Taxonomy;

if(!function_exists("getRequestURI"))
{
    function getRequestURI($with_query = false)
    {
        $uri = (isset($_SERVER['HTTP_X_REWRITE_URL'])) ? $_SERVER['HTTP_X_REWRITE_URL'] : $_SERVER['REQUEST_URI'];
        return ($with_query!==true&&isset($_GET)&&$_GET) ? preg_replace("/\?(.*)$/is","",$uri) : $uri;
    }
}

if(!function_exists("f1_get_page_title"))
{
    function f1_get_page_title()
    {
        if(function_exists("is_tag") && is_tag()) {
            $pg_title = single_tag_title("Tag Archive for \"",false)."\" - ";
        } elseif(is_archive()) {
           $pg_title =  wp_title("",false)." Archive - ";
        } elseif(is_search()) {
            $pg_title = "Search for \"".$s."\" - ";
        } elseif(is_404()) {
            $pg_title = "Not Found - ";
        } elseif(is_single()||is_page()) {
            $pg_title = wp_title("",false)." - ";
        } else {
            $pg_title = "";
        }
        $pg_title .= bloginfo("name").((is_home())?" - ".bloginfo("description"):"").(($paged>1)?" - Page ".$paged:"");
        return htmlentities($page_title);
    }
}

if(!function_exists("f1_get_repeater_subfields"))
{
    function f1_get_repeater_subfields($field_name,$subfields = [])
    {
        if(!function_exists("get_field")||!$subfields) {
            return [];
        }
        if(is_string($subfields)) {
            $subfields = explode(" ",$subfields);
        }
        if(!($row_count=get_field($field_name))) {
            return [];
        }
        $rows = [];
        for($n=0;$n<$row_count;$n++) {
            $row = [];
            foreach($subfields as $s) {
                $row[$s] = get_field($field_name."_".$n."_".$s);
            }
            if(count($subfields)===1) {
                $row = $row[$s];
            }
            $rows[] = $row;
        }
        return $rows;
    }
}

if(!function_exists("f1_get_image"))
{
    function f1_get_image($id,$size = [300,300])
    {
        $img = wp_get_attachment_image_src($id,$size);
        $image = new \stdClass;
        $image->url = $img[0];
        $image->width = $img[1];
        $image->height = $img[2];
        $image->title = $post->post_title;
        return $image;
    }
}

if(!function_exists("f1_get_image_field"))
{
    function f1_get_image_field($field_name,$size = [300,300],$post_id = false)
    {
        if(!($id=get_field($field_name,$post_id))) {
            return null;
        }
        $post = get_post($id);
        return f1_get_image($id,$size);
    }
}

if(!function_exists("f1_get_date_field"))
{
    function f1_get_date_field($field_name,$post_id,$format = "F d, Y")
    {
        if(!($field=get_field($field_name,$post_id,false))) {
            return null;
        }
        if(!preg_match("#^[0-9]{8}$#ismu",$field)) {
            return null;
        }
        $year = (int) substr($field,0,4);
        $month = (int) substr($field,4,2);
        $day = (int) substr($field,-2);
        return date($format,mktime(0,0,0,$month,$day,$year));
    }
}

if(!function_exists("f1_get_the_content"))
{
    function f1_get_the_content($post_id = null)
    {
        $content = "";
        if($post_id && ($post=get_post($post_id))) {
            $content = $post->post_content;
        } else if(is_null($post_id)&&have_posts()) {
            while(have_posts()) {
                the_post();
                $content = get_the_content();
                break;
            }
        }
        $content = apply_filters('the_content',$content);
        $content = str_replace(']]>',']]&gt;',$content);
        return $content;
    }
}

if(!function_exists("f1_get_menu_field"))
{
    function f1_get_menu_field($field,array $args =[],$post_id = false)
    {
        if(!($menu_id=get_field($field,$post_id))) {
            return null;
        }
        return f1_get_nav_menu(array_merge($args,['menu'=>$menu_id]));
    }
}

if(!function_exists("f1_get_content_field"))
{
    function f1_get_content_field($field,$post_id = false)
    {
        if(!($field=get_field($field,$post_id))) {
            return null;
        }
        return f1_apply_content_filter($field);
    }
}

if(!function_exists("f1_apply_content_filter"))
{
    function f1_apply_content_filter($field)
    {
        $field = apply_filters('the_content',$field);
        $field = str_replace(']]>',']]&gt;',$field);
        return $field;
    }
}

if(!function_exists("f1_get_post_term_object"))
{
    function f1_get_post_term_object(WP_Post &$post,$taxonomy)
    {
        return ($obj=wp_get_object_terms($post->ID,[$taxonomy])) ? $obj[0] : null;
    }
}

if(!function_exists("f1_get_all_posts"))
{
    function f1_get_all_posts()
    {
        $posts = [];
        if(have_posts()) {
            while(have_posts()) {
                the_post();
                $posts[] = get_post();
            }
        }
        return $posts;
    }
}

if(!function_exists("f1_get_first_post"))
{
    function f1_get_first_post($query = null)
    {
        global $wp_query;
        $query = (!$query) ? $wp_query : $query;
        if(!$query->have_posts()) {
            return null;
        }
        while($query->have_posts()) {
            $query->the_post();
            return get_post();
        }
    }
}

if(!function_exists("f1_get_term_object_field"))
{
    function f1_get_term_object_field(stdClass &$termObj,$field_name)
    {
        return Taxonomy::get_object_field($termObj,$field_name);
    }
}

if(!function_exists("f1_scheduled_to_display"))
{
    function f1_scheduled_to_display(array $image)
    {
        if(!isset($image['schedule'])||!is_array($image['schedule'])) {
            return true;
        }
        $now = new DateTime("now",new DateTimeZone(THEME_TIMEZONE));
        $today = $now->format("l");
        $curtime = $now->getTimestamp();
        foreach($image['schedule'] as $schedule) {
            if(isset($schedule['days'])&&is_array($schedule['days'])&&$schedule['days']) {
                if(!in_array($today,$schedule['days'])) {
                    continue;
                }
            }
            if(!isset($schedule['times'])||!is_array($schedule['times'])||!$schedule['times']) {
                return true;
            }
            foreach($schedule['times'] as $period) {
                if(!is_array($period)||!isset($period['start'])||!isset($period['end'])) {
                    continue;
                }
                $start_time = new DateTime($period['start'],new DateTimeZone(THEME_TIMEZONE));
                $end_time = new DateTime($period['end'],new DateTimeZone(THEME_TIMEZONE));
                if($start_time->getTimestamp()<=$curtime && $end_time->getTimestamp()>=$curtime) {
                    return true;
                }
            }
        }
        return false;
    }
}

if(!function_exists("f1_get_slider_images"))
{
    function f1_get_slider_images($field_name,$subfield_name,$scheduled_only = false)
    {
        $images = [];
        foreach(get_field($field_name) as $field) {
            if($scheduled_only===true) {
                if(!f1_scheduled_to_display($field)) {
                    continue;
                }
            }
           $image = $field[$subfield_name];
           unset($field[$subfield_name]);
           $image = array_merge($image,$field);
           $images[] = (object) $image;
        }
        return $images;
    }
}

$theme_functions = [
    'f1_get_page_title',
    'f1_get_repeater_subfields',
    'f1_get_image',
    'f1_get_image_field',
    'f1_get_date_field',
    'f1_get_the_content',
    'f1_get_menu_field',
    'f1_get_content_field',
    'f1_apply_content_filter',
    'f1_get_post_term_object',
    'f1_get_term_object_field',
    'f1_get_all_posts',
    'f1_get_first_post',
    'f1_get_slider_images'
];

foreach($theme_functions as $func) {
    $theme_func = preg_replace("#^f1_#",THEME_PREFIX,$func);
    if(!function_exists($theme_func)) {
        eval("function ".$theme_func."() { return call_user_func_array('".$func."',func_get_args()); }");
    }
}
