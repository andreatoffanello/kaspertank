<?php
/*
 * General Settings
 */

$options[]      = array(
    'name'        => 'general',
    'title'       => esc_html__( 'General Settings', 'aprimo' ),
    'icon'        => 'fa fa-star',
    'fields'      => array(
        array(
            'id'      => 'is_preloader',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Pre-loader ON/OFF', 'aprimo' ),
            'default' => false,
        ),
    ),
);
