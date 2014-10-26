<?php

if(!function_exists("get_acf_common_field"))
{
    function get_acf_common_field($field = null)
    {
        $fields['image_slider'] = [
            'key' => "field_".md5(THEME_PREFIX.'image_slider'),
            'label' => 'Image Slider',
            'name' => 'image_slider',
            'type' => 'repeater',
            'required' => 1,
            'sub_fields' => [
                [
                    'key' => "field_".md5(THEME_PREFIX.'image_slider_slider_image'),
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
                    'key' => "field_".md5(THEME_PREFIX.'image_slider_slider_image_link'),
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
                [
                    'key' => "field_".md5(THEME_PREFIX.'image_slider_schedule'),
                    'label' => 'Display Schedule<br />(Timezone: '.date("T").')<br />(Default: Always Active)',
                    'name' => 'schedule',
                    'type' => 'repeater',
                    'sub_fields' => [
                        [
                            'key' => "field_".md5(THEME_PREFIX.'image_slider_schedule_days'),
                            'label' => 'Days',
                            'name' => 'days',
                            'prefix' => '',
                            'type' => 'checkbox',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
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
                            ]),
                            'layout' => 'horizontal'
                        ],
                        [
                            'key' => "field_".md5(THEME_PREFIX.'image_slider_schedule_times'),
                            'label' => 'Times',
                            'name' => 'times',
                            'type' => 'repeater',
                            'column_width' => '',
                            'sub_fields' => [
                                [
                                    'key' => "field_".md5(THEME_PREFIX.'image_slider_schedule_times_start'),
                                    'label' => 'Start Time',
                                    'name' => 'start',
                                    'type' => 'date_time_picker',
                                    'column_width' => '',
                                    'show_date' => 'false',
                                    'date_format' => 'm/d/y',
                                    'time_format' => 'h:mm tt',
                                    'show_week_number' => 'false',
                                    'picker' => 'select',
                                    'save_as_timestamp' => 'false',
                                    'get_as_timestamp' => 'false',
                                ],
                                [
                                    'key' => "field_".md5(THEME_PREFIX.'image_slider_schedule_times_end'),
                                    'label' => 'End Time',
                                    'name' => 'end',
                                    'type' => 'date_time_picker',
                                    'column_width' => '',
                                    'show_date' => 'false',
                                    'date_format' => 'm/d/y',
                                    'time_format' => 'h:mm tt',
                                    'show_week_number' => 'false',
                                    'picker' => 'select',
                                    'save_as_timestamp' => 'false',
                                    'get_as_timestamp' => 'false',
                                ],
                            ],
                            'row_min' => '',
                            'row_limit' => '',
                            'layout' => 'table',
                            'button_label' => 'Add Time Interval',
                        ],
                    ],
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'row',
                    'button_label' => 'Add Scheduled Time',
                ],
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
            get_acf_common_field('image_slider')
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

}