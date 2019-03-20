<?php
// OneClick Demo Importer
add_filter( 'pt-ocdi/import_files', function() {
    return array(
        array(
            'import_file_name'             => esc_html__('Demo one', 'aprimo'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo1/aprimo1_contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo1/aprimo1_widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demo1/aprimo1.jpg',
            'import_notice'                => esc_html__( 'Make sure you have installed and activated all of the required plugins before you click on the "Import Demo Data" button.
                                              Navigate to Appearance > Install plugins to install those plugins.', 'aprimo' ),
            'preview_url'                  => 'http://wordpress.creativegigs.net/faster/',
        ),
        array(
            'import_file_name'             => esc_html__('Demo two', 'aprimo'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo2/aprimo2_contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo2/aprimo2_widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demo2/aprimo2.jpg',
            'import_notice'                => esc_html__( 'Make sure you have installed and activated all of the required plugins before you click on the "Import Demo Data" button.
                                              Navigate to Appearance > Install plugins to install those plugins.', 'aprimo' ),
            'preview_url'                  => 'http://wordpress.creativegigs.net/faster2',
        ),
        array(
            'import_file_name'             => esc_html__('Demo three', 'aprimo'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo3/aprimo3_contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo3/aprimo3_widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demo3/aprimo3.jpg',
            'import_notice'                => esc_html__( 'Make sure you have installed and activated all of the required plugins before you click on the "Import Demo Data" button.
                                              Navigate to Appearance > Install plugins to install those plugins.', 'aprimo' ),
            'preview_url'                  => 'http://wordpress.creativegigs.net/faster3',
        ),
    );
});


//

add_action( 'pt-ocdi/after_import', function() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations',
        array(
            'main_menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

});