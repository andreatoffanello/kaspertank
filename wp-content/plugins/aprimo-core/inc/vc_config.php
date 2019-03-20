<?php
add_action( 'vc_before_init', function() {
    if (class_exists('Vc_Manager')) {
// Add new custom font to Font Family selection in icon box module
        function zeckart_add_new_icon_set_to_iconbox()
        {
            $param = WPBMap::getParam('vc_icon', 'type');
            $param['value'][__('FlatIcon', 'total')] = 'gullu-flaticon';
            vc_update_shortcode_param('vc_icon', $param);
        }

        add_filter('init', 'zeckart_add_new_icon_set_to_iconbox', 40);


// Add array of your fonts so they can be displayed in the font selector
        function zeckart_icon_array()
        {
            return array(
                array('flaticon-straight-quotes' => 'Quotes'),
                array('flaticon-lock' => 'Lock'),
                array('flaticon-squares' => 'Square'),
                array('flaticon-multimedia' => 'Multimedia'),
                array('flaticon-diamond' => 'Diamond'),
                array('flaticon-tick' => 'Tick'),
            );
        }

        add_filter('vc_iconpicker-type-flaticon', 'zeckart_icon_array');


        /**
         * Register Backend and Frontend CSS Styles
         */
        add_action('vc_base_register_front_css', 'zeckart_vc_iconpicker_base_register_css');
        add_action('vc_base_register_admin_css', 'zeckart_vc_iconpicker_base_register_css');
        function zeckart_vc_iconpicker_base_register_css()
        {
            wp_register_style('gullu-flaticon', get_stylesheet_directory_uri() . '/assets/fonts/icon/font/flaticon.css');
        }

        /**
         * Enqueue Backend and Frontend CSS Styles
         */
        add_action('vc_backend_editor_enqueue_js_css', 'zeckart_vc_iconpicker_editor_jscss');
        add_action('vc_frontend_editor_enqueue_js_css', 'zeckart_vc_iconpicker_editor_jscss');
        function zeckart_vc_iconpicker_editor_jscss()
        {
            wp_enqueue_style('gullu-flaticon');
        }

        /**
         * Enqueue CSS in Frontend when it's used
         */
        add_action('vc_enqueue_font_icon_element', 'zeckart_enqueue_font_icomoon');
        function zeckart_enqueue_font_icomoon($font)
        {
            switch ($font) {
                case 'gull-flaticon':
                    wp_enqueue_style('gullu-flaticon');
            }
        }

    }
});