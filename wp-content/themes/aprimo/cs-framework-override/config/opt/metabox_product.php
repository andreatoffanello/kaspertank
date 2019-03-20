<?php

$options[]    = array(
    'id'        => 'product_metaboxes',
    'title'     => esc_html__('Product Meta fields', 'aprimo'),
    'post_type' =>  array('product'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'product_title_bar',
            'title' => esc_html__('Title-bar Settings', 'aprimo'),
            'icon'  => 'dashicons dashicons-minus',
            'fields' => array(
                array(
                    'id'        => 'is_titlebar',
                    'type'      => 'switcher',
                    'title'     => esc_html__('Show/Hide Page Title Bar', 'aprimo'),
                    'default'   => true
                ),
                array(
                    'id'        => 'titlebar_title',
                    'type'      => 'text',
                    'title'     => esc_html__('Title-bar title', 'aprimo'),
                    'default'   => esc_html__('Product details', 'aprimo'),
                    'dependency'=> array( 'is_titlebar', '==', 'true' ),
                ),
                array(
                    'id'        => 'titlebar_bg',
                    'type'      => 'upload',
                    'title'     => esc_html__('Title-bar background', 'aprimo'),
                    'dependency'=> array( 'is_titlebar', '==', 'true' ),
                ),
            ), // end: fields
        ), // end: a section
    ),
);