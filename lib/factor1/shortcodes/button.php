<?php # type, href, onclick, icon

if(!isset($href)) {
    $href = "#";
}

if(!isset($onclick)) {
    $onclick = "";
}

if(!isset($icon)) {
    $icon = "";
}

if(preg_match("#^trans-(red|black|white)(\s*)#ismu",$type)) {
    $icon = "fa-play-circle-o fa-lg";
}

echo    "<a href=\"".esc_html($href)."\" class=\"button button-".esc_html($type)."\"".(($onclick)?"onclick=\"".esc_html($onclick)."\"":"").">".
                "<span>".esc_html($content)."</span>".
                (($icon)?"<i class=\"fa ".esc_html($icon)."\"></i>":"").
            "</a>"
            ;
