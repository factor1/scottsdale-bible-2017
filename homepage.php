<?php
/*
Template Name: Homepage
*/

sb_campus_cookie_check();

get_header();
get_template_part("components/sections/image-slider");
get_template_part("components/sections/select-campus");
get_template_part("components/sections/last-and-upcoming-message");
get_template_part("components/sections/news-and-stories");
get_template_part("components/sections/upcoming-events");
get_template_part("components/sections/subscribe-to-news");
get_template_part("components/sections/banner");
get_footer();
