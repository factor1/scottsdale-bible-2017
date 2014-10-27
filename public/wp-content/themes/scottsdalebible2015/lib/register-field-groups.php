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

if(!function_exists("get_acf_common_field"))
{
    function get_acf_common_field($field = null,$key_prefix = "")
    {
        $fields['image_slider'] = [
            'key' => "field_".md5(THEME_PREFIX.$key_prefix.'image_slider'),
            'label' => 'Image Slider',
            'name' => 'image_slider',
            'type' => 'repeater',
            'required' => 1,
            'sub_fields' => [
                [
                    'key' => "field_".md5(THEME_PREFIX.$key_prefix.'image_slider_slider_image'),
                    'label' => 'Slider Image',
                    'name' => 'slider_image',
                    'prefix' => '',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all'
                ],
                [
                    'key' => "field_".md5(THEME_PREFIX.$key_prefix.'image_slider_slider_image_link'),
                    'label' => 'Slider Image LInk',
                    'name' => 'slider_image_link',
                    'prefix' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'default_value' => '',
                    'placeholder' => 'url',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => 255,
                    'readonly' => 0,
                    'disabled' => 0
                ],
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

        return (isset($fields[$field])) ? $fields[$field] : null;
    }
}



if(function_exists("register_field_group"))
{

    /* Homepage Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_homepage'),
        'title' => 'Homepage',
        'fields' => [
            get_acf_common_field('image_slider','homepage')
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
            get_acf_common_field('image_slider','campuses'),
            acf_field_def_text("field_".md5(THEME_PREFIX."campus_service_times"),"Service Times (Welcome Text)","service_times",['placeholder'=>'SUNDAY SERVICES @ 9 & 10:45 AM']),
            acf_field_def_google_map("field_".md5(THEME_PREFIX."campus_location"),"Map Location","map_location",[
                'center_lat' => '33.4483771',
                'center_lng' => '-112.0740373'
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

    /* Campus Fields */
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

    /* Sidebar Menu Fields */
    register_field_group([
        'id' => "field_".md5(THEME_PREFIX.'group_sidebar_menu'),
        'title' => 'Sidebar Menus',
        'fields' => [
            acf_field_def_checkbox("field_".md5(THEME_PREFIX."sidebar_use_parent_menu"),"","use_parent_menu",['choices'=>['1'=>'Use Parent Sidebar Menu (if set)'],'default_value'=>1]),
            acf_field_def_nav_menu("field_".md5(THEME_PREFIX."sidebar_sub_menu"),"Sidebar Menu","sidebar_menu",[
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
                ]
            ]),
            acf_field_def_image("field_".md5(THEME_PREFIX."featured_image"),"Featured Image","featured_image")
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

}