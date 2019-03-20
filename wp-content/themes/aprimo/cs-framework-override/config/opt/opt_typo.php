<?php

$options[]      = array(
    'name'        => 'opt_typo',
    'title'       => esc_html__( 'Typography options', 'aprimo' ),
    'icon'        => 'dashicons dashicons-editor-textcolor',
    'fields'      => array(
        array(
            'id'        => 'body_typo',
            'type'      => 'typography_advanced',
            'title'     => esc_html__('Body font properties', 'aprimo'),
            'default'   => array(
                'family'  => 'Poppins',
                'variant' => 'regular',
                'font'    => 'google',
                'size'    => '15',
                'height'  => '25',
                'color'   => '#767676'
            ),
            'preview'   => true, //Enable or disable preview box
            //'preview_text' => 'hello world', //Replace preview text with any text you like.
        ),
        array(
            'id'        => 'main_font',
            'type'      => 'typography_advanced',
            'title'     => esc_html__('Website Main Font', 'aprimo'),
            'default'   => array(
                'family'  => 'Lato',
                'variant' => 'regular',
                'font'    => 'google',
                'size'    => '24',
                'height'  => 'normal',
                'color'   => '#0f77ad'
            ),
            'preview'   => true, //Enable or disable preview box
            //'preview_text' => 'hello world', //Replace preview text with any text you like.
        ),
    )

);