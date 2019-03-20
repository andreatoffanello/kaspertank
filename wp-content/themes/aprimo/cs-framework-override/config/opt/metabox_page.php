<?php
$options[]    = array(
    'id'        => 'page_metaboxes',
    'title'     => esc_html__('Page title bar', 'aprimo'),
    'post_type' =>  array('page'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'page_title_bar',
            'icon'  => 'dashicons dashicons-minus',
            'fields' => array(
                array(
                    'id'        => 'is_titlebar',
                    'type'      => 'switcher',
                    'title'     => esc_html__('Title Bar', 'aprimo'),
                    'default'   => true
                ),
            ),
        ),
    ),
);