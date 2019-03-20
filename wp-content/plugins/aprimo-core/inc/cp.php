<?php


add_action('init', function() {
    // Project / Portfolio
    register_post_type('portfolio', array(
        'public'    => true,
        'supports'  => array('title','editor', 'thumbnail', 'taxonomy'),
        'labels'    => array(
            'name'          => esc_html__('Portfolio', 'aprimo-core'),
            'add_new_item'  => esc_html__('Add Portfolio Item', 'aprimo-core'),
            'add_new'       => esc_html__('Add Item', 'aprimo-core')
        ),
        'taxonomies'            => array( 'categories' ),
        'hierarchical'          => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'publicly_queryable'    => true,
        'menu_icon'             => 'dashicons-images-alt2'
    ));
    register_taxonomy('portfolio_cat', 'portfolio', array(
        'public'                => true,
        'hierarchical'          => true,
        'show_admin_column'     => true,
        'show_in_nav_menus'     => false,
        'labels'                => array(
            'name'  => esc_html__('Portfolio Categories', 'aprimo-core'),
        )
    ));

});


