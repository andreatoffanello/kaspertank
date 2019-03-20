<?php

$options[]      = array(
    'name'      => 'blog_settings',
    'title'     => esc_html__( 'Blog Page Settings', 'aprimo' ),
    'icon'      => 'dashicons dashicons-admin-post',
    'fields'    => array(
        array(
            'title'     => esc_html__('Blog title', 'aprimo'),
            'id'        => 'blog_title',
            'type'      => 'text',
            'default'   => 'Our News',
        ),
        array(
            'title'     => esc_html__('Header Background', 'aprimo'),
            'id'        => 'blog_header_bg',
            'type'      => 'image',
            'desc'      => esc_html__( 'Upload here a high resolution image file for blog header area.', 'aprimo' ),
            'compiler'  => true,
        ),
    )

);