<?php

if(!function_exists("acf_field_def_text"))
{
    function acf_field_def_text($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => 512,
            'readonly' => 0,
            'disabled' => 0
        ],$data);
    }
}

if(!function_exists("acf_field_def_google_map"))
{
    function acf_field_def_google_map($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'google_map',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'center_lat' => '',
            'center_lng' => '',
            'zoom' => '11',
            'height' => ''
        ],$data);
    }
}

if(!function_exists("acf_field_def_checkbox"))
{
    function acf_field_def_checkbox($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'checkbox',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'choices' => [],
            'default_value' => '',
            'layout' => 'horizontal'
        ],$data);
    }
}

if(!function_exists("acf_field_def_nav_menu"))
{
    function acf_field_def_nav_menu($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'nav_menu',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'save_format' => 'id',
            'container' => 0,
            'allow_null' => 1
        ],$data);
    }
}

if(!function_exists("acf_field_def_image"))
{
    function acf_field_def_image($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all'
        ],$data);
    }
}

if(!function_exists("acf_field_def_post_object"))
{
    function acf_field_def_post_object($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'post_object',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'post_type' => [],
            'taxonomy' => '',
            'allow_null' => 1,
            'multiple' => 0,
            'return_format' => 'object',
            'ui' => 1,
        ],$data);
    }
}

if(!function_exists("acf_field_def_true_false"))
{
    function acf_field_def_true_false($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'message' => '',
            'default_value' => 0
        ],$data);
    }
}

if(!function_exists("acf_field_def_email"))
{
    function acf_field_def_email($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'email',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => ''
        ],$data);
    }
}

if(!function_exists("acf_field_def_repeater"))
{
    function acf_field_def_repeater($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'min' => '',
            'max' => '',
            'layout' => 'table',
            'button_label' => 'Add Row',
            'sub_fields' => []
        ],$data);
    }
}

if(!function_exists("acf_field_def_date_time_picker"))
{
    function acf_field_def_date_time_picker($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'date_time_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'show_date' => 'false',
            'date_format' => 'm/d/y',
            'time_format' => 'h:mm tt',
            'show_week_number' => 'false',
            'picker' => 'select',
            'save_as_timestamp' => 'false',
            'get_as_timestamp' => 'false',
        ],$data);
    }
}

if(!function_exists("acf_field_def_checkbox"))
{
    function acf_field_def_checkbox($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'checkbox',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'choices' => [],
            'default_value' => implode("\n",[]),
            'layout' => 'horizontal'
        ],$data);
    }
}

if(!function_exists("acf_field_def_wysiwyg"))
{
    function acf_field_def_wysiwyg($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'type' => 'wysiwyg',
            'default_value' => '',
            'toolbar'=> 'full',
            'media_upload'=> 'yes'
        ],$data);
    }
}

if(!function_exists("acf_field_def_tab"))
{
    function acf_field_def_tab($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0
        ],$data);
    }
}

if(!function_exists("acf_field_def_url"))
{
    function acf_field_def_url($field_key,$field_label,$field_name,array $data = [])
    {
        return array_merge([
            'key' => $field_key,
            'label' => $field_label,
            'name' => $field_name,
            'prefix' => '',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'default_value' => '',
            'placeholder' => ''
        ],$data);
    }
}

if(!function_exists("get_acf_common_field"))
{
    function get_acf_common_field($field = null,$key_prefix = "")
    {
        $fields['image_slider'] = [
            'key' => "field_".md5(THEME_PREFIX.$key_prefix.'image_slider'),
            'label' => 'Image Slider',
            'name' => 'image_slider',
            'type' => 'repeater',
            'required' => 0,
            'sub_fields' => [
                acf_field_def_image("field_".md5(THEME_PREFIX.$key_prefix.'image_slider_slider_image'),'Slider Image','slider_image',[
                    'required' => 1
                ]),
                acf_field_def_url("field_".md5(THEME_PREFIX.$key_prefix.'image_slider_slider_image_link'),'Slider Image LInk','slider_image_link'),
                acf_field_def_repeater("field_".md5(THEME_PREFIX.$key_prefix.'image_slider_schedule'),'Display Schedule<br />(Timezone: '.date("T").')<br />(Default: Always Active)',"schedule",[
                    'sub_fields'=>[
                        acf_field_def_checkbox("field_".md5(THEME_PREFIX.$key_prefix.'image_slider_schedule_days'),"Days","days",[
                            'choices' => [
                                'Sunday' => 'Sun',
                                'Monday' => 'Mon',
                                'Tuesday' => 'Tues',
                                'Wednesday' => 'Wed',
                                'Thursday' => 'Thurs',
                                'Friday' => 'Fri',
                                'Saturday' => 'Sat',
                            ],
                            'default_value' => implode("\n",[
                                'Sunday' => 'Sunday',
                                'Monday' => 'Monday',
                                'Tuesday' => 'Tuesday',
                                'Wednesday' => 'Wednesday',
                                'Thursday' => 'Thursday',
                                'Friday' => 'Friday',
                                'Saturday' => 'Saturday',
                            ])
                        ]),
                        acf_field_def_repeater("field_".md5(THEME_PREFIX.$key_prefix.'image_slider_schedule_times'),"Times","times",[
                            'sub_fields'=>[
                                acf_field_def_date_time_picker("field_".md5(THEME_PREFIX.$key_prefix.'image_slider_schedule_times_start'),"Start Time","start"),
                                acf_field_def_date_time_picker("field_".md5(THEME_PREFIX.$key_prefix.'image_slider_schedule_times_end'),"End Time","end")
                            ],
                            'button_label' => 'Add Time Interval'
                        ])
                    ],
                    'layout' => 'row',
                    'button_label' => 'Add Schedule'
                ]),
            ],
            'row_min' => 1,
            'row_limit' => '',
            'layout' => 'row',
            'button_label' => 'Add Image',
        ];

        $fields['news_and_stories'] = [
            'key' => "field_".md5(THEME_PREFIX.$key_prefix.'news_and_stories'),
            'label' => 'News and Stories',
            'name' => 'news_and_stories',
            'type' => 'repeater',
            'required' => 0,
            'sub_fields' => [
                acf_field_def_post_object("field_".md5(THEME_PREFIX."news_and_stories_post"),"","news_story",['post_type'=>[0 =>THEME_PREFIX.'news_story']])
            ],
            'row_min' => 1,
            'row_limit' => '',
            'layout' => 'table',
            'button_label' => 'Add Story',
        ];

        return (isset($fields[$field])) ? $fields[$field] : null;
    }
}



if(function_exists("register_field_group"))
{

    /* Default Post Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_posts'),
        'title' => 'Posts',
        'fields' => [
            acf_field_def_text("field_".md5(THEME_PREFIX."post_subtitle"),"Subtitle (optional)","subtitle",['placeholder'=>'short excerpt for front pages']),
            acf_field_def_image("field_".md5(THEME_PREFIX."post_featured_image"),"Featured Image","featured_image"),
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post'
                ]
            ],
        ],
        'options' => [
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'custom_fields',
                1 => 'featured_image'
            ]
        ]
    ]);

    /* Homepage Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_homepage'),
        'title' => 'Homepage',
        'fields' => [
            get_acf_common_field('image_slider','homepage'),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."homepage_last_weekend_message"),"Last Weekend Meesage","last_weekend_message",[
                'min'=>'0',
                'max'=>'1',
                'sub_fields'=>[
                    acf_field_def_image("field_".md5(THEME_PREFIX."homepage_last_weekend_image"),"Image","image"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."homepage_last_weekend_title"),"Headline","title"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."homepage_last_weekend_subtitle"),"Subline","subtitle"),
                    acf_field_def_url("field_".md5(THEME_PREFIX."homepage_last_weekend_url"),"URL","url")
                ],
                'layout'=>'row',
                'button_label'=>'Add Message'
            ]),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."homepage_upcoming_message"),"Upcoming Meesage","upcoming_message",[
                'min'=>'0',
                'max'=>'1',
                'sub_fields'=>[
                    acf_field_def_image("field_".md5(THEME_PREFIX."homepage_upcoming_image"),"Image","image"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."homepage_upcoming_title"),"Headline","title"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."homepage_upcoming_subtitle"),"Subline","subtitle"),
                    acf_field_def_url("field_".md5(THEME_PREFIX."homepage_upcoming_url"),"URL","url")
                ],
                'layout'=>'row',
                'button_label'=>'Add Message'
            ]),
            get_acf_common_field('news_and_stories','homepage'),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."homepage_upcoming_events"),"Upcoming Events","upcoming_events",[
                'sub_fields'=>[
                    acf_field_def_post_object("field_".md5(THEME_PREFIX."homepage_upcoming_event"),"","event",['post_type'=>'event'])
                ],
                'button_label'=>'Add Event'
            ])
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'homepage.php'
                ]
            ],
        ],
        'options' => [
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'custom_fields',
                2 => 'revisions',
                3 => 'format',
                4 => 'featured_image',
                5 => 'categories',
                6 => 'tags',
                7 => 'send-trackbacks'
            ]
        ]
    ]);

    /* Campus Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_campuses'),
        'title' => 'Campuses',
        'fields' => [

            acf_field_def_true_false("field_".md5(THEME_PREFIX."campus_inherit_slider"),"","use_homepage_slider",[
                'default_value'=>'1',
                'message' => 'Use Homepage Image Slider'
            ]),

            array_merge(get_acf_common_field('image_slider','campuses'),[
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."campus_inherit_slider"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ]),

            acf_field_def_text("field_".md5(THEME_PREFIX."campus_service_times"),"Service Times (Welcome Text)","service_times",['placeholder'=>'SUNDAY SERVICES @ 9 & 10:45 AM']),
            acf_field_def_google_map("field_".md5(THEME_PREFIX."campus_location"),"Map Location","map_location",[
                'center_lat' => '33.4483771',
                'center_lng' => '-112.0740373'
            ]),

            acf_field_def_true_false("field_".md5(THEME_PREFIX."campus_inherit_messages"),"","use_homepage_messages",[
                'default_value'=>'1',
                'message' => 'Use Homepage Last Weekend and Upcoming Messages'
            ]),

            acf_field_def_repeater("field_".md5(THEME_PREFIX."campus_last_weekend_message"),"Last Weekend Meesage","last_weekend_message",[
                'min'=>'0',
                'max'=>'1',
                'sub_fields'=>[
                    acf_field_def_image("field_".md5(THEME_PREFIX."campus_last_weekend_image"),"Image","image"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."campus_last_weekend_title"),"Headline","title"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."campus_last_weekend_subtitle"),"Subline","subtitle"),
                    acf_field_def_url("field_".md5(THEME_PREFIX."campus_last_weekend_url"),"URL","url")
                ],
                'layout'=>'row',
                'button_label'=>'Add Message',
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."campus_inherit_messages"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ]),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."campus_upcoming_message"),"Upcoming Meesage","upcoming_message",[
                'min'=>'0',
                'max'=>'1',
                'sub_fields'=>[
                    acf_field_def_image("field_".md5(THEME_PREFIX."campus_upcoming_image"),"Image","image"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."campus_upcoming_title"),"Headline","title"),
                    acf_field_def_text("field_".md5(THEME_PREFIX."campus_upcoming_subtitle"),"Subline","subtitle"),
                    acf_field_def_url("field_".md5(THEME_PREFIX."campus_upcoming_url"),"URL","url")
                ],
                'layout'=>'row',
                'button_label'=>'Add Message',
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."campus_inherit_messages"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ]),
            acf_field_def_true_false("field_".md5(THEME_PREFIX."campus_inherit_news"),"","use_homepage_news",[
                'default_value'=>'1',
                'message' => 'Use Homepage News and Stories'
            ]),
            array_merge(get_acf_common_field('news_and_stories','campus'),[
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."campus_inherit_news"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ]),
            acf_field_def_true_false("field_".md5(THEME_PREFIX."campus_inherit_events"),"","use_homepage_events",[
                'default_value'=>'1',
                'message' => 'Use Homepage Upcoming Events'
            ]),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."campus_upcoming_events"),"Upcoming Events","upcoming_events",[
                'sub_fields'=>[
                    acf_field_def_post_object("field_".md5(THEME_PREFIX."campus_upcoming_event"),"","event",['post_type'=>'event'])
                ],
                'button_label'=>'Add Event',
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."campus_inherit_events"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ])
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => THEME_PREFIX.'campus'
                ]
            ],
        ],
        'options' => [
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'custom_fields',
                2 => 'revisions',
                3 => 'format',
                4 => 'featured_image',
                5 => 'categories',
                6 => 'tags',
                7 => 'send-trackbacks'
            ]
        ]
    ]);

    /* News Story Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_news_stories'),
        'title' => 'News Stories',
        'fields' => [
            acf_field_def_text("field_".md5(THEME_PREFIX."news_story_subtitle"),"Subtitle","story_subtitle",['placeholder'=>'short excerpt for front pages']),
            acf_field_def_image("field_".md5(THEME_PREFIX."news_story_featured_image"),"Featured Image","featured_image"),
            acf_field_def_checkbox("field_".md5(THEME_PREFIX."news_story_show_sidebar"),"","show_side_bar",['choices'=>['1'=>'Show Sidebar Column'],'default_value'=>0]),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."news_story_sidebar_sub_menus"),"Sidebar Menus","sidebar_menus",[
                'sub_fields' => [
                    acf_field_def_nav_menu("field_".md5(THEME_PREFIX."news_story_sidebar_menu"),"Sidebar Menu","sidebar_menu")
                ],
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."news_story_show_sidebar"),
                            'operator' => '==',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ],
                'button_label' => 'Add Menu'
            ]),
            acf_field_def_wysiwyg("field_".md5(THEME_PREFIX."news_story_sidebar_content"),"Sidebar Content","sidebar_content",[
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."news_story_show_sidebar"),
                            'operator' => '==',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ]),
            acf_field_def_wysiwyg("field_".md5(THEME_PREFIX."news_story_page_content"),"Main Page Content","page_content")
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => THEME_PREFIX.'news_story'
                ]
            ],
        ],
        'options' => [
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'custom_fields',
                2 => 'revisions',
                3 => 'format',
                4 => 'categories',
                5 => 'tags',
                6 => 'featured_image',
                7 => 'send-trackbacks'
            ]
        ]
    ]);

    /* Event Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_events'),
        'title' => 'Events',
        'fields' => [
            acf_field_def_text("field_".md5(THEME_PREFIX."event_subtitle"),"Subtitle","event_subtitle",['placeholder'=>'for front pages, e.g. "Friday, September 26, 7pm, Worship Center"']),
            acf_field_def_image("field_".md5(THEME_PREFIX."event_featured_image"),"Featured Image","featured_image"),
            acf_field_def_wysiwyg("field_".md5(THEME_PREFIX."event_excerpt"),"Short Excerpt","event_excerpt")
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'event'
                ]
            ],
        ],
        'options' => [
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'custom_fields',
                1 => 'revisions',
                2 => 'format',
                3 => 'categories',
                4 => 'tags',
                5 => 'featured_image',
                6 => 'send-trackbacks'
            ]
        ]
    ]);

    /* Group Fields */
    /*
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_church_groups'),
        'title' => 'Church Groups',
        'fields' => [
            acf_field_def_post_object("field_".md5(THEME_PREFIX."church_group_campus"),"Campus","campus",['post_type'=>[0 => 'sb_campus']]),
            acf_field_def_true_false("field_".md5(THEME_PREFIX."church_group_on_campus"),"On Campus?","on_campus"),
            acf_field_def_text("field_".md5(THEME_PREFIX."church_group_leader"),"Group Leader","group_leader"),
            acf_field_def_text("field_".md5(THEME_PREFIX."church_group_life_stage"),"Life Stage","life_stage"),
            acf_field_def_true_false("field_".md5(THEME_PREFIX."church_group_child_friendly"),"Child Friendly?","child_friendly"),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."church_group_meeting_times"),"Meeting Times","meeting_times",['sub_fields'=>[
                acf_field_def_text("field_".md5(THEME_PREFIX."church_group_meets_on"),"Meets On","meets_on"),
                acf_field_def_date_time_picker("field_".md5(THEME_PREFIX."church_group_meet_time"),"Meeting Time","meeting_time")
            ]]),
            acf_field_def_google_map("field_".md5(THEME_PREFIX."church_group_map_location"),"Map Location","map_location",[
                'center_lat' => '33.4483771',
                'center_lng' => '-112.0740373',
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."church_group_on_campus"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ]),
            acf_field_def_email("field_".md5(THEME_PREFIX."church_group_contact_email"),"Contact Email","contact_email")
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => THEME_PREFIX.'group'
                ]
            ],
        ],
        'options' => [
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'custom_fields',
                2 => 'revisions',
                3 => 'format',
                4 => 'featured_image',
                5 => 'categories',
                6 => 'tags',
                7 => 'send-trackbacks'
            ]
        ]
    ]);
    */

    /* Sidebar Menu Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_sidebar_menu'),
        'title' => 'Sidebar Menus',
        'fields' => [
            acf_field_def_image("field_".md5(THEME_PREFIX."featured_image"),"Featured Image","featured_image"),
            acf_field_def_checkbox("field_".md5(THEME_PREFIX."sidebar_use_parent_menu"),"","use_parent_menu",['choices'=>['1'=>'Use Parent Sidebar Menu(s)'],'default_value'=>1]),
            acf_field_def_repeater("field_".md5(THEME_PREFIX."sidebar_sub_menus"),"Sidebar Menus","sidebar_menus",[
                'sub_fields' => [
                    acf_field_def_nav_menu("field_".md5(THEME_PREFIX."sidebar_menu"),"Sidebar Menu","sidebar_menu")
                ],
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."sidebar_use_parent_menu"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ],
                'button_label' => 'Add Menu'
            ]),
            acf_field_def_checkbox("field_".md5(THEME_PREFIX."sidebar_use_parent_sidebar_content"),"","use_parent_sidebar_content",['choices'=>['1'=>'Use Parent Sidebar Content'],'default_value'=>1]),
            acf_field_def_wysiwyg("field_".md5(THEME_PREFIX."sidebar_content"),"Sidebar Content","sidebar_content",[
                'conditional_logic' => [
                    'status' => 1,
                    'rules' => [
                        [
                            'field' => "field_".md5(THEME_PREFIX."sidebar_use_parent_sidebar_content"),
                            'operator' => '!=',
                            'value' => '1'
                        ],
                    ],
                    'allorany' => 'all'
                ]
            ]),
            acf_field_def_wysiwyg("field_".md5(THEME_PREFIX."page_content"),"Main Page Content","page_content")
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'homepage.php'
                ]
            ],
        ],
        'options' => [
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'custom_fields',
                2 => 'revisions',
                3 => 'format',
                4 => 'categories',
                5 => 'tags',
                6 => 'featured_image',
                7 => 'send-trackbacks'
            ]
        ]
    ]);

    /* Theme Options */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_theme_options'),
        'title' => 'Theme Options',
        'fields' => [
            acf_field_def_tab("field_".md5(THEME_PREFIX."tab_social_media"),"Social Media","tab_social_media"),
            /*
            acf_field_def_text("field_".md5(THEME_PREFIX."theme_options_twiiter_url"),"Twitter URL","twitter_url"),
            acf_field_def_text("field_".md5(THEME_PREFIX."theme_options_facebook_url"),"Facebook URL","twitter_url"),
            */
            acf_field_def_text("field_".md5(THEME_PREFIX."theme_options_instagram_url"),"Instagram URL","instagram_url"),
            acf_field_def_text("field_".md5(THEME_PREFIX."theme_options_flickr_url"),"Flickr URL","flickr_url")
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-theme-options'
                ]
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => ''
    ]);

}