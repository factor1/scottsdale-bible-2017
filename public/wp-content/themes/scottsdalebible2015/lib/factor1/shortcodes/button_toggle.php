<?php # type, icon, title, style, content

if(!$type) {
    $type = "";
}

if(!isset($icon)) {
    $icon = "";
}

$id = "tog".md5(uniqid(microtime(),true));

echo '<div class="'.esc_html($style).'">'.
            '<div>'.
                "<a href=\"".esc_html($href)."\" class=\"button ".esc_html($type)."\" data-toggle=\"#".$id."\">".
                    "<span>".esc_html($title)."</span>".
                    (($icon)?"<i class=\"fa ".esc_html($icon)."\"></i>":"").
                "</a>".
            '</div>'.
            '<div id="'.$id.'" style="display:none">'.
                do_shortcode($content).
            '</div>'.
        '</div>';