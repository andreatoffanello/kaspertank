<?php

$options[]      = array(
    'name'        => 'header_options',
    'title'       => esc_html__( 'Header Settings', 'aprimo' ),
    'icon'        => 'dashicons dashicons-arrow-up-alt',
    'fields'        => array(
        array(
            'type'      => 'subheading',
            'content'   => esc_html__('Header navigation bar settings', 'aprimo')
        ),
        array(
            'title'     => esc_html__('Logo Upload', 'aprimo'),
            'id'        => 'aprimo_logo',
            'type'      => 'image',
            'desc'      => esc_html__( 'Upload here a image file for your logo', 'aprimo' ),
            'compiler'  => true,
        ),
        array(
            'id'        => 'titlebar_padding',
            'type'      => 'text',
            'title'     => esc_html__('Title bar padding', 'aprimo'),
            'desc'      => esc_html__('Input the padding as clock wise (Top Right Bottom Left).', 'aprimo'),
            'value'     => '230px 0 180px 0'
        ),
        array(
            'id'        => 'titlebar_overlay_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Title bar overlay color', 'aprimo'),
            'value'     => 'rgba(0,0,10,0.55)'
        ),
        array(
            'id'        => 'page_margin_top',
            'type'      => 'text',
            'title'     => esc_html__('Page margin top', 'aprimo'),
            'desc'      => esc_html__('Page margin top will appear after the page title bar.', 'aprimo'),
            'value'     => '190px'
        ),
        array(
            'id'      => 'is_sticky_menu',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Sticky menu', 'aprimo' ),
            'default' => false,
        ),
    )
);