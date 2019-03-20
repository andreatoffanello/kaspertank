<?php
$options[]      = array(
    'name'        => 'color_settings',
    'title'       => esc_html__( 'Color options', 'aprimo' ),
    'icon'        => 'dashicons dashicons-admin-appearance',
    'fields'      => array(
        array(
            'title'     => esc_html__('Accent color scheme', 'aprimo'),
            'desc'      => esc_html__( 'Change the website main color.', 'aprimo' ),
            'id'        => 'accent_color',
            'type'      => 'image_select',
            'options'   => array(
                'green' => APRIMO_DIR_IMG.'/green.png',
                'red'   => APRIMO_DIR_IMG.'/red.png',
                'blue'  => APRIMO_DIR_IMG.'/blue.png',
            ),
        ),
    )

);