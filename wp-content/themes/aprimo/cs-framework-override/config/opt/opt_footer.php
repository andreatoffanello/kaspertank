<?php
$options[]      = array(
    'name'        => 'footer_options',
    'title'       => esc_html__( 'Footer settings', 'aprimo' ),
    'icon'        => 'dashicons dashicons-arrow-down-alt',
    'sections'    => array(
        array(
            'title' => esc_html__('Google Map', 'aprimo'),
            'name'  => 'google-map',
            'fields'=> array(
                array(
                    'title'     => esc_html__('ON/OFF Map?', 'aprimo'),
                    'id'        => 'is_map',
                    'type'      => 'switcher',
                    'default'   => true
                ),
                array(
                    'dependency'=> array('is_map', '==', 'true'),
                    'title'     => esc_html__('Google map api KEY', 'aprimo'),
                    'desc'      => wp_kses_post(__("Follow <a href='https://developers.google.com/maps/documentation/javascript/get-api-key' target='_blank'> this link </a> and click on Get a key", 'aprimo')),
                    'id'        => 'map_api',
                    'type'      => 'text',
                    'default'   => 'AIzaSyAnRI3acyZHNqLj-a4sQdU4vQLlzuwOyoI'
                ),
                array(
                    'dependency'=> array('is_map', '==', 'true'),
                    'title'     => esc_html__('Map Address', 'aprimo'),
                    'id'        => 'map_address',
                    'type'      => 'textarea',
                    'default'   => 'San Francisco, CA 560 Bush St &amp; 20th Ave, Apt <br>5 San Francisco, 230909',
                    'sanitize'  => 'disabled'
                ),
                array(
                    'dependency'=> array('is_map', '==', 'true'),
                    'title'     => esc_html__('Latitude', 'aprimo'),
                    'desc'      => wp_kses_post(__("Get latitude from <a href='http://www.mapcoordinates.net/en' target='_blank'>here</a>", 'aprimo')),
                    'id'        => 'latitude',
                    'type'      => 'text',
                    'default'   => '40.72'
                ),
                array(
                    'dependency'=> array('is_map', '==', 'true'),
                    'title'     => esc_html__('Longitude', 'aprimo'),
                    'desc'      => wp_kses_post(__("Get Longitude from <a href='http://www.mapcoordinates.net/en' target='_blank'>here</a>", 'aprimo')),
                    'id'        => 'longitude',
                    'type'      => 'text',
                    'default'   => '-74'
                ),
                array(
                    'dependency'=> array('is_map', '==', 'true'),
                    'title'     => esc_html__('Map Zoom Label', 'aprimo'),
                    'id'        => 'map_zoom',
                    'type'      => 'text',
                    'default'   => '14'
                ),
            )
        ),
        array(
            'name' => 'subscribe-form-settings',
            'title' => esc_html__('Subscribe form', 'aprimo'),
            'fields' => array(
                array(
                    'type'      => 'subheading',
                    'content'   => esc_html__('Subscribe form', 'aprimo'),
                ),
                array(
                    'title'     => esc_html__('ON/OFF form', 'aprimo'),
                    'id'        => 'is_mc_form',
                    'type'      => 'switcher',
                    'default'   => true
                ),
                array(
                    'dependency'=>array('is_mc_form', '==', 'true'),
                    'title'     => esc_html__('Form title', 'aprimo'),
                    'id'        => 'mc_form_title',
                    'type'      => 'text',
                    'default'   => 'Subscribe  Our News latter!!',
                    'attributes' => array(
                        'style'    => 'width: 100%;'
                    ),
                ),
                array(
                    'dependency'=>array('is_mc_form', '==', 'true'),
                    'title'     => esc_html__('Form action URL', 'aprimo'),
                    'desc'      => wp_kses_post(__('Input your MailChimp form action URL. Please follow <a href="https://goo.gl/MFB6FD" target="_blank">this guide</a> to find your Mailchimp form action URL', 'aprimo')),
                    'id'        => 'mc_form_action',
                    'type'      => 'text',
                    'attributes' => array(
                        'style'    => 'width: 100%;'
                    ),
                ),
                array(
                    'dependency'=>array('is_mc_form', '==', 'true'),
                    'title'     => esc_html__('Form submit button label', 'aprimo'),
                    'id'        => 'mc_form_btn_label',
                    'type'      => 'text',
                    'default'   => 'SIGN UP'
                ),
            )
        ),
        array(
            'name' => 'footer-settings-sec',
            'title' => esc_html__('Footer settings', 'aprimo'),
            'fields'    => array(
                array(
                    'title'     => esc_html__('Footer background color', 'aprimo'),
                    'id'        => 'footer_bg_color',
                    'type'      => 'color_picker',
                    'default'   => 'linear-gradient( -90deg, rgb(248,252,255) 0%, rgba(255,255,255,0) 100%)'
                ),
                array(
                    'id'         => 'copyright_text',
                    'type'       => 'textarea',
                    'title'      => esc_html__('Copyright text: ', 'aprimo'),
                    'desc'       => esc_html__('HTML allowed', 'aprimo'),
                    'attributes' => array(
                        'style'    => 'width: 100%;'
                    ),
                    'default'	  => '© 2017 CreativeGigs. All rights reserved',
                    'sanitize'    => 'disabled'
                ),
            ),
        )
    ),

);