<?php

// $campus = get_queried_object();
// sb_set_campus_cookie($campus->ID);

get_header();
get_template_part("components/sections/image-slider");
get_template_part("components/sections/home-hero");
get_template_part("components/sections/image-hero");
get_template_part("components/sections/get-involved");
get_template_part("components/sections/upcoming-story");
get_template_part("components/sections/last-and-upcoming-message");
get_template_part("components/sections/upcoming-message");
// get_template_part("components/sections/news-and-stories");
get_template_part("components/sections/blog-section-alternate");
get_template_part("components/sections/plan-your-visit");
get_template_part("components/sections/location-map");
get_template_part("components/sections/subscribe-to-news");
// get_template_part("components/sections/banner");
get_footer();
