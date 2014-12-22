<?php

$campus = get_queried_object();
sb_set_campus_cookie($campus->ID);

get_header();
get_template_part("components/sections/image-slider");
get_template_part("components/sections/welcome-to-campus");
get_template_part("components/sections/last-and-upcoming-message");
get_template_part("components/sections/news-and-stories");
get_template_part("components/sections/upcoming-events");
get_template_part("components/sections/subscribe-to-news");
get_footer();