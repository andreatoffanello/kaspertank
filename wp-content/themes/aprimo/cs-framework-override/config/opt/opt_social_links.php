<?php
$options[]      = array(
    'name'        => 'social_links',
    'title'       => esc_html__( 'Social Links', 'aprimo'),
    'icon'        => 'fa fa-cog',
    // Headers Variations
    'fields' => array(
        array(
            'id'    => 'facebook',
            'type'  => 'text',
            'title' => 'Facebook',
            'attributes' => array(
                'style'  => 'width: 100%;'
            ),
            'default'	 => '#'
        ),
        array(
            'id'    => 'twitter',
            'type'  => 'text',
            'title' => esc_html__('Twitter', 'aprimo'),
            'attributes' => array(
                'style'    => 'width: 100%;'
            ),
            'default'	  => '#'
        ),
        array(
            'id'    => 'googleplus',
            'type'  => 'text',
            'title' => esc_html__('Google Plus', 'aprimo'),
            'attributes' => array(
                'style'    => 'width: 100%;'
            ),
            'default'	  => '#'
        ),
        array(
            'id'    => 'lnkedin',
            'type'  => 'text',
            'title' => esc_html__('Linked In', 'aprimo'),
            'attributes' => array(
                'style'    => 'width: 100%;'
            ),
            'default'	  => '#'
        ),
        array(
            'id'    => 'dribbble',
            'type'  => 'text',
            'title' => esc_html__('Dribbble', 'aprimo'),
            'attributes' => array(
                'style'    => 'width: 100%;'
            ),
            'default'	  => '#'
        ),
        array(
            'id'    => 'youtube',
            'type'  => 'text',
            'title' => esc_html__('Youtube', 'aprimo'),
            'attributes' => array(
                'style'    => 'width: 100%;'
            ),
        ),
        array(
            'id'              => 'social_links',
            'type'            => 'group',
            'title'           => esc_html__('Add more', 'aprimo'),
            'button_title'    => esc_html__('Add new', 'aprimo'),
            'accordion_title' => esc_html__('Adding New Social Link', 'aprimo'),
            'fields'          => array(
                array(
                    'id'          => 'social_icon',
                    'type'        => 'icon',
                    'title'       => esc_html__('Icon', 'aprimo'),
                ),
                array(
                    'id'          => 'social_link',
                    'type'        => 'text',
                    'title'       => esc_html__('Link', 'aprimo'),
                    'default'     => '#'
                ),
            )
        ),

    ),
);