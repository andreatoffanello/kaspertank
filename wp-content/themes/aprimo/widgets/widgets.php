<?php

// Register Widget areas
add_action('widgets_init', function() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'aprimo'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'aprimo'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="sidebar-box widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
});