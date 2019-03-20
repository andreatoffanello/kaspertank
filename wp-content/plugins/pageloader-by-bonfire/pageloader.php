<?php
/*
Plugin Name: PageLoader by Bonfire 
Plugin URI: http://bonfirethemes.com/
Description: Loading Screen and Progress Bar for WordPress. Customize under Appearance → Customize → PageLoader Plugin.
Version: 3.3
Author: Bonfire Themes
Author URI: http://bonfirethemes.com/
License: GPL2
*/

    //
	// WORDPRESS LIVE CUSTOMIZER
	//
    function pageloader_theme_customizer( $wp_customize ) {

        //
        // ADD "PAGELOADER" PANEL TO LIVE CUSTOMIZER 
        //
        $wp_customize->add_panel('pageloader_panel', array('title' => __('PageLoader Plugin', 'pageloader'),'priority' => 10,));
        
        //
        // ADD "Loading Icon/Image" SECTION TO "PAGELOADER" PANEL 
        //
        $wp_customize->add_section('pageloader_main_section',array('title' => __( 'Loading Icon/Image', 'pageloader' ),'panel' => 'pageloader_panel','priority' => 10));

        /* hide icon/image */
        $wp_customize->add_setting('bonfire_pageloader_hide_icon_image',array('sanitize_callback' => 'sanitize_bonfire_pageloader_hide_icon_image',));
        function sanitize_bonfire_pageloader_hide_icon_image( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_hide_icon_image',array('type' => 'checkbox','label' => 'Hide icon/image','description' => 'If checked, the loading icon/image will not be displayed.','section' => 'pageloader_main_section',));
        
        /* icon selection */
        $wp_customize->add_setting('pageloader_icon_selection',array(
            'default' => 'icon1',
        ));
        $wp_customize->add_control('pageloader_icon_selection',array(
            'type' => 'select',
            'label' => 'Icon style',
            'section' => 'pageloader_main_section',
            'choices' => array(
                'icon1' => 'Icon 1',
                'icon2' => 'Icon 2',
                'icon3' => 'Icon 3',
                'icon4' => 'Icon 4',
                'icon5' => 'Icon 5',
                'icon6' => 'Icon 6',
                'icon7' => 'Icon 7',
                'icon8' => 'Icon 8',
                'icon9' => 'Icon 9',
                'icon10' => 'Icon 10',
        ),
        ));
        
        /* icon size */
        $wp_customize->add_setting('pageloader_icon_size',array(
            'default' => '100',
        ));
        $wp_customize->add_control('pageloader_icon_size',array(
            'type' => 'select',
            'label' => 'Icon size',
            'section' => 'pageloader_main_section',
            'choices' => array(
                '25' => '25%',
                '50' => '50%',
                '75' => '75%',
                '100' => '100%',
        ),
        ));
        
        /* icon color */
        $wp_customize->add_setting( 'bonfire_pageloader_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_icon_color',array(
            'label' => 'Icon color', 'settings' => 'bonfire_pageloader_icon_color', 'section' => 'pageloader_main_section' )
        ));
        
        /* custom loading image */
        $wp_customize->add_setting('pageloader_custom_loading_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'pageloader_custom_loading_image',
            array(
                'label' => 'Custom loading image',
                'description' => 'Overrides icon selection above. Please note: The "rotation direction" and "animation speed" options below are applied to the image as well.',
                'section' => 'pageloader_main_section',
                'settings' => 'pageloader_custom_loading_image'
        )
        ));
        
        /* custom loading image from url */
        $wp_customize->add_setting('pageloader_custom_loading_image_url',array('sanitize_callback' => 'sanitize_pageloader_custom_loading_image_url',));
        function sanitize_pageloader_custom_loading_image_url($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('pageloader_custom_loading_image_url',array(
            'type' => 'text',
            'label' => 'Custom loading image from URL',
            'description' => 'If you need to use an off-site image as your loading image, enter its URL here (will override image selection above).',
            'section' => 'pageloader_main_section',
        ));
        
        /* custom loading image alt text */
        $wp_customize->add_setting('pageloader_custom_loading_image_alt_text',array('sanitize_callback' => 'sanitize_pageloader_custom_loading_image_alt_text',));
        function sanitize_pageloader_custom_loading_image_alt_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('pageloader_custom_loading_image_alt_text',array(
            'type' => 'text',
            'label' => 'Custom loading image ALT text',
            'description' => 'If you would like ALT text added to the image, add it here.',
            'section' => 'pageloader_main_section',
        ));
        
        /* custom loading image size */
        $wp_customize->add_setting('pageloader_custom_loading_image_size',array('sanitize_callback' => 'sanitize_pageloader_custom_loading_image_size',));
        function sanitize_pageloader_custom_loading_image_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('pageloader_custom_loading_image_size',array(
            'type' => 'text',
            'label' => 'Custom loading image size (in pixels)',
            'description' => 'By default, the default size of the image is used (but gets sized down gradually depending on screen size to prevent it from going beyond screen bounds).',
            'section' => 'pageloader_main_section',
        ));
        
        /* animation speed */
        $wp_customize->add_setting('pageloader_animation_speed',array(
            'default' => 'medium',
        ));
        $wp_customize->add_control('pageloader_animation_speed',array(
            'type' => 'select',
            'label' => 'Animation speed',
            'section' => 'pageloader_main_section',
            'choices' => array(
                'slow' => 'Slow',
                'medium' => 'Medium',
                'fast' => 'Fast',
                'none' => 'Disable animation',
        ),
        ));
        
        /* rotation animation direction */
        $wp_customize->add_setting('bonfire_pageloader_clockwise_animation',array('sanitize_callback' => 'sanitize_bonfire_pageloader_clockwise_animation',));
        function sanitize_bonfire_pageloader_clockwise_animation( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_clockwise_animation',array('type' => 'checkbox','label' => 'Change rotation direction','description' => 'If checked, icon/image animates counter-clockwise. If unchecked, animates clockwise).','section' => 'pageloader_main_section',));
        
        /* fade animation */
        $wp_customize->add_setting('bonfire_pageloader_fade_animation',array('sanitize_callback' => 'sanitize_bonfire_pageloader_fade_animation',));
        function sanitize_bonfire_pageloader_fade_animation( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_fade_animation',array('type' => 'checkbox','label' => 'Fade animation','description' => 'Animation speed setting applies. If unchecked, loading icon/image will rotate instead.','section' => 'pageloader_main_section',));
        
        /* loading image blur effect */
        $wp_customize->add_setting('pageloader_icon_image_blur',array('sanitize_callback' => 'sanitize_pageloader_icon_image_blur',));
        function sanitize_pageloader_icon_image_blur($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('pageloader_icon_image_blur',array(
            'type' => 'text',
            'label' => 'Blur effect (in pixels)',
            'description' => 'Adds blur effect to loading icon/image on load start. Note: effect not yet perfectly supported by all browsers. Example: 10',
            'section' => 'pageloader_main_section',
        ));
        
        /* loading icon/image opacity */
        $wp_customize->add_setting('pageloader_icon_image_opacity',array('sanitize_callback' => 'sanitize_pageloader_icon_image_opacity',));
        function sanitize_pageloader_icon_image_opacity( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('pageloader_icon_image_opacity',array('type' => 'checkbox','label' => 'Fades in loading icon/image on load start.','section' => 'pageloader_main_section',));
        
        /* loading image animation effect animation speed */
        $wp_customize->add_setting('pageloader_icon_image_animation_speed',array('sanitize_callback' => 'sanitize_pageloader_icon_image_animation_speed',));
        function sanitize_pageloader_icon_image_animation_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('pageloader_icon_image_animation_speed',array(
            'type' => 'text',
            'label' => 'Blur/opacity animation speeds (in seconds)',
            'description' => 'Example: 5. If empty, defaults to 2.',
            'section' => 'pageloader_main_section',
        ));
        
        //
        // ADD "Loading Text, Dots, Close Function" SECTION TO "PAGELOADER" PANEL 
        //
        $wp_customize->add_section('pageloader_text_dots_section',array('title' => __( 'Loading Text, Dots, Close Function', 'pageloader' ),'panel' => 'pageloader_panel','priority' => 10));
        
        /* loading text #1 */
        $wp_customize->add_setting('bonfire_pageloader_custom_loading_text',array('sanitize_callback' => 'sanitize_bonfire_pageloader_custom_loading_text',));
        function sanitize_bonfire_pageloader_custom_loading_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_custom_loading_text',array(
            'type' => 'text',
            'label' => 'Loading text',
            'description' => 'A short sentence to display under the loading icon. If empty, no text will be shown. If multiple fields are filled, sentences will be randomized.',
            'section' => 'pageloader_text_dots_section',
        ));

        /* loading text #2 */
        $wp_customize->add_setting('bonfire_pageloader_custom_loading_text2',array('sanitize_callback' => 'sanitize_bonfire_pageloader_custom_loading_text2',));
        function sanitize_bonfire_pageloader_custom_loading_text2($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_custom_loading_text2',array(
            'type' => 'text',
            'section' => 'pageloader_text_dots_section',
        ));
        
        /* loading text #3 */
        $wp_customize->add_setting('bonfire_pageloader_custom_loading_text3',array('sanitize_callback' => 'sanitize_bonfire_pageloader_custom_loading_text3',));
        function sanitize_bonfire_pageloader_custom_loading_text3($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_custom_loading_text3',array(
            'type' => 'text',
            'section' => 'pageloader_text_dots_section',
        ));
        
        /* loading text font size */
        $wp_customize->add_setting('bonfire_pageloader_loading_text_font_size',array('sanitize_callback' => 'sanitize_bonfire_pageloader_loading_text_font_size',));
        function sanitize_bonfire_pageloader_loading_text_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_loading_text_font_size',array(
            'type' => 'text',
            'label' => 'Loading text font size (in pixels)',
            'description' => 'Font size for the loading text. If empty, will default to 14',
            'section' => 'pageloader_text_dots_section',
        ));
        
        /* text color */
        $wp_customize->add_setting( 'bonfire_pageloader_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_text_color',array(
            'label' => 'Loading text', 'settings' => 'bonfire_pageloader_text_color', 'section' => 'pageloader_text_dots_section' )
        ));
        
        /* show loading dots */
        $wp_customize->add_setting('bonfire_pageloader_show_dots',array('sanitize_callback' => 'sanitize_bonfire_pageloader_show_dots',));
        function sanitize_bonfire_pageloader_show_dots( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_show_dots',array('type' => 'checkbox','label' => 'Show animated dots','description' => 'Very useful if you are for example showing a static logo as the loading image but would still like to convey loading progress to the visitor.','section' => 'pageloader_text_dots_section',));
        
        /* loading dots scaling */
        $wp_customize->add_setting('bonfire_pageloader_dots_scale',array('sanitize_callback' => 'sanitize_bonfire_pageloader_dots_scale',));
        function sanitize_bonfire_pageloader_dots_scale($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_dots_scale',array(
            'type' => 'text',
            'label' => 'Animated dots scaling',
            'description' => 'Example: 1.5 or 2.75. If empty, will default to 1.',
            'section' => 'pageloader_text_dots_section',
        ));
        
        /* dots color */
        $wp_customize->add_setting( 'bonfire_pageloader_dots_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_dots_color',array(
            'label' => 'Dots', 'settings' => 'bonfire_pageloader_dots_color', 'section' => 'pageloader_text_dots_section' )
        ));
        
        /* close function text */
        $wp_customize->add_setting('bonfire_pageloader_custom_close_delay',array('sanitize_callback' => 'sanitize_bonfire_pageloader_custom_close_delay',));
        function sanitize_bonfire_pageloader_custom_close_delay($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_custom_close_delay',array(
            'type' => 'text',
            'label' => 'Close function delay (in milliseconds)',
            'description' => 'Example: 2000 or 3500 (2 and 3.5 seconds respectively). If empty, will default to 6000.',
            'section' => 'pageloader_text_dots_section',
        ));
        
        /* close function text */
        $wp_customize->add_setting('bonfire_pageloader_custom_close_text',array('sanitize_callback' => 'sanitize_bonfire_pageloader_custom_close_text',));
        function sanitize_bonfire_pageloader_custom_close_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_custom_close_text',array(
            'type' => 'text',
            'label' => 'Close function text',
            'description' => 'If empty, will default to "Taking too long? Close loading screen."',
            'section' => 'pageloader_text_dots_section',
        ));
        
        /* close function color */
        $wp_customize->add_setting('bonfire_pageloader_close_color', array( 'sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_close_color',array(
            'label' => 'Close function text', 'settings' => 'bonfire_pageloader_close_color', 'section' => 'pageloader_text_dots_section')
        ));
        
        /* use theme fonts */
        $wp_customize->add_setting('bonfire_pageloader_theme_font',array('default' => '','sanitize_callback' => 'sanitize_bonfire_pageloader_theme_font',));
        function sanitize_bonfire_pageloader_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use one of your theme fonts, enter it in the textfield below as it appears in the theme stylesheet.','section' => 'pageloader_text_dots_section',));
        
        /* unload GFont */
        $wp_customize->add_setting('bonfire_pageloader_unload_gfont',array('sanitize_callback' => 'sanitize_bonfire_pageloader_unload_gfont',));
        function sanitize_bonfire_pageloader_unload_gfont( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_unload_gfont',array('type' => 'checkbox','label' => 'Unload GoogleFont','description' => 'Useful when not making use of the loading or close function text features, or when using the theme font feature above.','section' => 'pageloader_text_dots_section',));
        
        //
        // ADD "Progress Bar" SECTION TO "PAGELOADER" PANEL 
        //
        $wp_customize->add_section('pageloader_progressbar_section',array('title' => __( 'Progress Bar', 'pageloader' ),'panel' => 'pageloader_panel','priority' => 10));
        
        /* disable progress bar */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_disable',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_disable',));
        function sanitize_bonfire_pageloader_progressbar_disable( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_progressbar_disable',array('type' => 'checkbox','label' => 'Disable progress bar','section' => 'pageloader_progressbar_section',));
        
        /* disable progress bar on touch devices only */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_disable_touch',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_disable_touch',));
        function sanitize_bonfire_pageloader_progressbar_disable_touch( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_progressbar_disable_touch',array('type' => 'checkbox','label' => 'Disable progress bar (on touch devices only)','description'=>'Due to some mobile browsers already having a built-in loading bar, you may wish to enable this option to hide the PageLoader bar on touch devices.','section' => 'pageloader_progressbar_section',));
        
        /* progress bar color */
        $wp_customize->add_setting( 'bonfire_pageloader_progressbar_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_progressbar_color',array(
            'label' => 'Progress bar', 'settings' => 'bonfire_pageloader_progressbar_color', 'section' => 'pageloader_progressbar_section' )
        ));
        
        /* progress bar gradient color */
        $wp_customize->add_setting( 'bonfire_pageloader_progressbar_color_gradient', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_progressbar_color_gradient',array(
            'label' => 'Progress bar gradient', 'description' => 'To add a gradient effect to the progress bar, pick a secondary color here.', 'settings' => 'bonfire_pageloader_progressbar_color_gradient', 'section' => 'pageloader_progressbar_section' )
        ));
        
        /* progress bar color */
        $wp_customize->add_setting( 'bonfire_pageloader_progressbar_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_progressbar_background_color',array(
            'label' => 'Progress bar background', 'settings' => 'bonfire_pageloader_progressbar_background_color', 'section' => 'pageloader_progressbar_section' )
        ));
        
        /* progress bar width */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_width',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_width',));
        function sanitize_bonfire_pageloader_progressbar_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_progressbar_width',array(
            'type' => 'text',
            'label' => 'Progress bar width (in pixels)',
            'description' => 'Example: 500. If empty, defaults to full width.',
            'section' => 'pageloader_progressbar_section',
        ));
        
        /* progress bar height */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_height',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_height',));
        function sanitize_bonfire_pageloader_progressbar_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_progressbar_height',array(
            'type' => 'text',
            'label' => 'Progress bar height (in pixels)',
            'description' => 'Example: 5 or 10. If empty, defaults to 3.',
            'section' => 'pageloader_progressbar_section',
        ));
        
        /* progress padding */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_padding',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_padding',));
        function sanitize_bonfire_pageloader_progressbar_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_progressbar_padding',array(
            'type' => 'text',
            'label' => 'Progress bar padding (in pixels)',
            'description' => 'Example: 10. If empty, defaults to 0.',
            'section' => 'pageloader_progressbar_section',
        ));

        /* bottom position */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_bottom',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_bottom',));
        function sanitize_bonfire_pageloader_progressbar_bottom( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_progressbar_bottom',array('type' => 'checkbox','label' => 'Bottom of screen','description' => 'If unticked, progress bar will be shown at the top.','section' => 'pageloader_progressbar_section',));
        
        /* below loading icon/image */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_below_icon',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_below_icon',));
        function sanitize_bonfire_pageloader_progressbar_below_icon( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_progressbar_below_icon',array('type' => 'checkbox','label' => 'Below icon/image','description' => 'Places the progress bar below the loading image (if enabled, bottom positioning is ignored).','section' => 'pageloader_progressbar_section',));
        
        /* show progressbar only */
        $wp_customize->add_setting('bonfire_pageloader_progressbar_only',array('sanitize_callback' => 'sanitize_bonfire_pageloader_progressbar_only',));
        function sanitize_bonfire_pageloader_progressbar_only( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_progressbar_only',array('type' => 'checkbox','label' => 'Show progress bar only','description' => 'If ticked, all other elements (the loading screen, icon/image etc.) will be hidden. Only the progress bar will be displayed.','section' => 'pageloader_progressbar_section',));
        
        //
        // ADD "Background" SECTION TO "PAGELOADER" PANEL 
        //
        $wp_customize->add_section('pageloader_background_section',array('title' => __( 'Background', 'pageloader' ),'panel' => 'pageloader_panel','priority' => 10));
        
        /* background animation */
        $wp_customize->add_setting('pageloader_background_animation',array(
            'default' => 'fade',
        ));
        $wp_customize->add_control('pageloader_background_animation',array(
            'type' => 'select',
            'label' => 'Background animation',
            'section' => 'pageloader_background_section',
            'choices' => array(
                'fade' => 'Fade away',
                'top' => 'Slide Top',
                'left' => 'Slide Left',
                'right' => 'Slide Right',
                'bottom' => 'Slide Bottom',
        ),
        ));
        
        /* disappearance speed */
        $wp_customize->add_setting('bonfire_pageloader_disappearance_speed',array('sanitize_callback' => 'sanitize_bonfire_pageloader_disappearance_speed',));
        function sanitize_bonfire_pageloader_disappearance_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_disappearance_speed',array(
            'type' => 'text',
            'label' => 'Disappearance speed (in seconds)',
            'description' => 'The speed at which the loading screen disappears. Example: 0.75 or 2. If empty, defaults to 1.',
            'section' => 'pageloader_background_section',
        ));
        
        /* disappearance scaling */
        $wp_customize->add_setting('bonfire_pageloader_background_scaling',array('sanitize_callback' => 'sanitize_bonfire_pageloader_background_scaling',));
        function sanitize_bonfire_pageloader_background_scaling($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_background_scaling',array(
            'type' => 'text',
            'label' => 'Disappearance scaling',
            'description' => 'The scale to which the loading screen disappears. Example: 0.75 or 1.25. If empty, defaults to 1 (no scaling).',
            'section' => 'pageloader_background_section',
        ));
        
        /* background color */
        $wp_customize->add_setting( 'bonfire_pageloader_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonfire_pageloader_background_color',array(
            'label' => 'Background color', 'settings' => 'bonfire_pageloader_background_color', 'section' => 'pageloader_background_section' )
        ));
        
        /* background opacity */
        $wp_customize->add_setting('bonfire_pageloader_background_opacity',array('sanitize_callback' => 'sanitize_bonfire_pageloader_background_opacity',));
        function sanitize_bonfire_pageloader_background_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_background_opacity',array(
            'type' => 'text',
            'label' => 'Background opacity (from 0-1)',
            'description' => 'Example: 0.25 or 0.5. If empty, defaults to 1.',
            'section' => 'pageloader_background_section',
        ));
        
        /* background image */
        $wp_customize->add_setting('pageloader_background_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'pageloader_background_image',
            array(
                'label' => 'Background image',
                'section' => 'pageloader_background_section',
                'settings' => 'pageloader_background_image'
        )
        ));
        
        /* background as cover */
        $wp_customize->add_setting('bonfire_pageloader_background_cover',array('sanitize_callback' => 'sanitize_bonfire_pageloader_background_cover',));
        function sanitize_bonfire_pageloader_background_cover( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_background_cover',array('type' => 'checkbox','label' => 'Show background image in full screen','section' => 'pageloader_background_section',));
        
        /* background image opacity */
        $wp_customize->add_setting('bonfire_pageloader_background_image_opacity',array('sanitize_callback' => 'sanitize_bonfire_pageloader_background_image_opacity',));
        function sanitize_bonfire_pageloader_background_image_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_background_image_opacity',array(
            'type' => 'text',
            'label' => 'Background image opacity (from 0-1)',
            'description' => 'Example: 0.4 or 0.95. If empty, defaults to .2.',
            'section' => 'pageloader_background_section',
        ));
        
        //
        // ADD "Content Slide-in" SECTION TO "PAGELOADER" PANEL 
        //
        $wp_customize->add_section('pageloader_slidein_section',array('title' => __( 'Content Slide-in, Scaling', 'pageloader' ),'description' => __( 'Note: This feature might cause styling conflicts with some themes/plugins, for example ones that override default browser behavior or ones that already have their own content animations.' ),'panel' => 'pageloader_panel','priority' => 10));
        
        /* slide-in content */
        $wp_customize->add_setting('bonfire_pageloader_slidein_content',array('sanitize_callback' => 'sanitize_bonfire_pageloader_slidein_content',));
        function sanitize_bonfire_pageloader_slidein_content( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_slidein_content',array('type' => 'checkbox','label' => 'Content animation','description' => 'Enables content animation as loading screen closes.','section' => 'pageloader_slidein_section',));
        
        /* custom elements */
        $wp_customize->add_setting('bonfire_pageloader_slidein_custom_elements',array('sanitize_callback' => 'sanitize_bonfire_pageloader_slidein_custom_elements',));
        function sanitize_bonfire_pageloader_slidein_custom_elements($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_slidein_custom_elements',array(
            'type' => 'text',
            'label' => 'Only target specific elements',
            'description' => 'By default, PageLoader will attempt to apply animation to your entire site body. If you find some elements acting up though, or if you want to apply animation only to specific elements, then use this text field to target those elements. Separate classes/IDs by comma.',
            'section' => 'pageloader_slidein_section',
        ));
        
        /* slide-in speed */
        $wp_customize->add_setting('bonfire_pageloader_slidein_speed',array('sanitize_callback' => 'sanitize_bonfire_pageloader_slidein_speed',));
        function sanitize_bonfire_pageloader_slidein_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_slidein_speed',array(
            'type' => 'text',
            'label' => 'Slide-in speed (in seconds)',
            'description' => 'Example: 0.75 or 2. If empty, defaults to 1.',
            'section' => 'pageloader_slidein_section',
        ));
        
        /* slide-in distance */
        $wp_customize->add_setting('bonfire_pageloader_slidein_distance',array('sanitize_callback' => 'sanitize_bonfire_pageloader_slidein_distance',));
        function sanitize_bonfire_pageloader_slidein_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_slidein_distance',array(
            'type' => 'text',
            'label' => 'Slide-in distance (in pixels)',
            'description' => 'Example: 50 or -250 (enter negative value to slide-in from the top). If empty, defaults to -100.',
            'section' => 'pageloader_slidein_section',
        ));
        
        /* content scaling */
        $wp_customize->add_setting('bonfire_pageloader_content_scaling',array('sanitize_callback' => 'sanitize_bonfire_pageloader_content_scaling',));
        function sanitize_bonfire_pageloader_content_scaling($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_content_scaling',array(
            'type' => 'text',
            'label' => 'Content scaling',
            'description' => 'Example: 0.95 or 1.25. If empty, defaults to 1 (no scaling).',
            'section' => 'pageloader_slidein_section',
        ));
        
        /* content opacity */
        $wp_customize->add_setting('bonfire_pageloader_content_opacity',array('sanitize_callback' => 'sanitize_bonfire_pageloader_content_opacity',));
        function sanitize_bonfire_pageloader_content_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_content_opacity',array(
            'type' => 'text',
            'label' => 'Content opacity (0-1)',
            'description' => 'Example: 0.5. If empty, defaults to 1.',
            'section' => 'pageloader_slidein_section',
        ));
        
        //
        // ADD "Misc." SECTION TO "PAGELOADER" PANEL 
        //
        $wp_customize->add_section('pageloader_misc_section',array('title' => __( 'Misc.', 'pageloader' ),'panel' => 'pageloader_panel','priority' => 10));
        
        /* show on mobile only */
        $wp_customize->add_setting('bonfire_pageloader_mobile_only',array('sanitize_callback' => 'sanitize_bonfire_pageloader_mobile_only',));
        function sanitize_bonfire_pageloader_mobile_only( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_mobile_only',array('type' => 'checkbox','label' => 'Show on touch devices only','description' => 'The loading screen will be shown on touch devices only.','section' => 'pageloader_misc_section',));
        
        /* show on front page only */
        $wp_customize->add_setting('bonfire_pageloader_front_page_only',array('sanitize_callback' => 'sanitize_bonfire_pageloader_front_page_only',));
        function sanitize_bonfire_pageloader_front_page_only( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('bonfire_pageloader_front_page_only',array('type' => 'checkbox','label' => 'Show on front page only','description' => 'The loading screen will be shown on the front page only.','section' => 'pageloader_misc_section',));
        
        /* show once per browser session */
        $wp_customize->add_setting('pageloader_browser_session',array('sanitize_callback' => 'sanitize_pageloader_browser_session',));
        function sanitize_pageloader_browser_session( $input ) {if ( $input == 1 ) {return 1;} else {return '';}}
        $wp_customize->add_control('pageloader_browser_session',array('type' => 'checkbox','label' => 'Show once per session','description' => 'The loading screen is shown only once per visitor browser session.','section' => 'pageloader_misc_section',));
        
        /* loading elements slide-in*/
        $wp_customize->add_setting('pageloader_elements_slidein',array('sanitize_callback' => 'sanitize_pageloader_elements_slidein',));
        function sanitize_pageloader_elements_slidein( $input ) {if ( $input == 1 ) {return 1;} else {return '';}}
        $wp_customize->add_control('pageloader_elements_slidein',array('type' => 'checkbox','label' => 'Loading elements slide-in','description' => 'When enabled, the loading icon/image and other loading elements have a brief slide-in animation.','section' => 'pageloader_misc_section',));
        
        /* custom delay */
        $wp_customize->add_setting('bonfire_pageloader_custom_delay',array('sanitize_callback' => 'sanitize_bonfire_pageloader_custom_delay',));
        function sanitize_bonfire_pageloader_custom_delay($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('bonfire_pageloader_custom_delay',array(
            'type' => 'text',
            'label' => 'Custom delay (in milliseconds)',
            'description' => 'Upon load completion, the loading screen will remain visible for the specified amount of time. Example: 500 or 1500 (0.5 and 1.5 seconds respectively).',
            'section' => 'pageloader_misc_section',
        ));

    }
    add_action('customize_register', 'pageloader_theme_customizer');
    
    //
	// Once per session option
	//
    if( get_theme_mod('pageloader_browser_session') != '') {
        add_action('init', 'pageloader_register_session');
        function pageloader_register_session() {
            if( !session_id() ) {
                session_start();
            }
        }
    }

	//
	// Insert PageLoader into the header
	//
	function bonfire_pageloader_header() {

        if (!isset($_SESSION['pageloader_session'])) { $_SESSION['pageloader_session'] = '0';
            if( get_theme_mod('bonfire_pageloader_front_page_only') != '') {
                if( is_front_page() || is_home() ) {
                    if( get_theme_mod('bonfire_pageloader_mobile_only') != '') {
                        if ( wp_is_mobile() ) {
                            include( plugin_dir_path( __FILE__ ) . 'include.php');
                        }
                    } else {
                        include( plugin_dir_path( __FILE__ ) . 'include.php');
                    }
                }
            } else {
                // BEGIN GET POST ID (FOR PER-POST/PAGE PageLoader HIDE)
                global $post;
                $bonfire_pageloader_display = get_post_meta($post->ID, 'bonfire_pageloader_display', true);
                //END GET POST ID (FOR PER-POST/PAGE PageLoader HIDE)
                
                if( get_theme_mod('bonfire_pageloader_mobile_only') != '') {
                    if ( wp_is_mobile() ) {
                        include( plugin_dir_path( __FILE__ ) . 'include.php');
                    }
                } else {
                    include( plugin_dir_path( __FILE__ ) . 'include.php');
                }
            }
        } $_SESSION['pageloader_session']++;
	
	}
	add_action('wp_head','bonfire_pageloader_header');

    //
	// ENQUEUE Google WebFonts
	//
    if( get_theme_mod('bonfire_pageloader_unload_gfont') == '') {
        function pageloader_fonts_url() {
            $font_url = '';

            if ( 'off' !== _x( 'on', 'Google font: on or off', 'pageloader' ) ) {
                $font_url = add_query_arg( 'family', urlencode( 'Roboto:300' ), "//fonts.googleapis.com/css" );
            }
            return $font_url;
        }
        function pageloader_scripts() {
            if (!isset($_SESSION['pageloader_session_gfont'])) { $_SESSION['pageloader_session_gfont'] = '0';
                wp_enqueue_style( 'pageloader-fonts', pageloader_fonts_url(), array(), '1.0.0' );
            } $_SESSION['pageloader_session_gfont']++;
        }
        add_action( 'wp_enqueue_scripts', 'pageloader_scripts' );
    }


	//
	// ENQUEUE pageloader.css (only when loading screen visible)
	//   
	function bonfire_pageloader_css() {
        if (!isset($_SESSION['pageloader_session_css'])) { $_SESSION['pageloader_session_css'] = '0';
            if( get_theme_mod('bonfire_pageloader_front_page_only') != '') {
                if( is_front_page() || is_home() ) {
                    if( get_theme_mod('bonfire_pageloader_mobile_only') != '') {
                        if ( wp_is_mobile() ) {
                            wp_register_style( 'bonfire-pageloader-css', plugins_url( '/pageloader.css', __FILE__ ) . '', array(), '1', 'all' );
                            wp_enqueue_style( 'bonfire-pageloader-css' );
                        }
                    } else {
                        wp_register_style( 'bonfire-pageloader-css', plugins_url( '/pageloader.css', __FILE__ ) . '', array(), '1', 'all' );
                        wp_enqueue_style( 'bonfire-pageloader-css' );
                    }
                }
            } else {
                // BEGIN GET POST ID (FOR PER-POST/PAGE PageLoader HIDE)
                global $post;
                $bonfire_pageloader_display = get_post_meta($post->ID, 'bonfire_pageloader_display', true);
                //END GET POST ID (FOR PER-POST/PAGE PageLoader HIDE)
                
                if( get_theme_mod('bonfire_pageloader_mobile_only') != '') {
                    if ( wp_is_mobile() ) {
                        wp_register_style( 'bonfire-pageloader-css', plugins_url( '/pageloader.css', __FILE__ ) . '', array(), '1', 'all' );
                        wp_enqueue_style( 'bonfire-pageloader-css' );
                    }
                } else {
                    wp_register_style( 'bonfire-pageloader-css', plugins_url( '/pageloader.css', __FILE__ ) . '', array(), '1', 'all' );
                    wp_enqueue_style( 'bonfire-pageloader-css' );
                }
            }
        } $_SESSION['pageloader_session_css']++;
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_pageloader_css' );


	//
	// ENQUEUE pageloader.js (only when loading screen visible)
	//
	function bonfire_pageloader_js() {
        if (!isset($_SESSION['pageloader_session_js'])) { $_SESSION['pageloader_session_js'] = '0';
            if( get_theme_mod('bonfire_pageloader_front_page_only') != '') {
                if( is_front_page() || is_home() ) {
                    if( get_theme_mod('bonfire_pageloader_mobile_only') != '') {
                        if ( wp_is_mobile() ) {
                            wp_register_script( 'bonfire-pageloader-js', plugins_url( '/pageloader.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
                            wp_enqueue_script( 'bonfire-pageloader-js' );
                        }
                    } else {
                        wp_register_script( 'bonfire-pageloader-js', plugins_url( '/pageloader.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
                        wp_enqueue_script( 'bonfire-pageloader-js' );
                    }
                }
            } else {
                // BEGIN GET POST ID (FOR PER-POST/PAGE PageLoader HIDE)
                global $post;
                $bonfire_pageloader_display = get_post_meta($post->ID, 'bonfire_pageloader_display', true);
                //END GET POST ID (FOR PER-POST/PAGE PageLoader HIDE)
                
                if( get_theme_mod('bonfire_pageloader_mobile_only') != '') {
                    if ( wp_is_mobile() ) {
                        wp_register_script( 'bonfire-pageloader-js', plugins_url( '/pageloader.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
                        wp_enqueue_script( 'bonfire-pageloader-js' );
                    }
                } else {
                    wp_register_script( 'bonfire-pageloader-js', plugins_url( '/pageloader.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
                    wp_enqueue_script( 'bonfire-pageloader-js' );
                }
            }
        } $_SESSION['pageloader_session_js']++;
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_pageloader_js' );

    //
	// Allow Shortcodes in Text Widget
	//
	add_filter('widget_text', 'do_shortcode');
	
	//
	// Register Widgets
	//
	function bonfire_pageloader_widgets_init() {

		register_sidebar( array(
		'name' => __( 'PageLoader Widgets', 'bonfire' ),
		'id' => 'pageloader-widgets',
		'description' => __( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	add_action( 'widgets_init', 'bonfire_pageloader_widgets_init' );
    
	//
	// Insert theme customizer options into the header
	//
	function bonfire_pageloader_header_customize() {
	?>
    
    <?php if (!isset($_SESSION['pageloader_session_customizer'])) { $_SESSION['pageloader_session_customizer'] = '0'; ?>

		<style>
        /* custom icon size */
        .bonfire-pageloader-icon-wrapper img { width:<?php echo get_theme_mod('pageloader_custom_loading_image_size'); ?>px; }
		/* background and icon color + background opacity */
		.bonfire-pageloader-background { background-color:<?php echo get_theme_mod('bonfire_pageloader_background_color'); ?>; opacity:<?php echo get_theme_mod('bonfire_pageloader_background_opacity'); ?>; }
        .bonfire-pageloader-background-image { opacity:<?php echo get_theme_mod('bonfire_pageloader_background_image_opacity'); ?>; }
		.bonfire-pageloader-icon svg { fill:<?php echo get_theme_mod('bonfire_pageloader_icon_color'); ?>; }
		.bonfire-pageloader-sentence {
            font-size:<?php echo get_theme_mod('bonfire_pageloader_loading_text_font_size'); ?>px;
            color:<?php echo get_theme_mod('bonfire_pageloader_text_color'); ?>;
        }
        .close-pageloader { color:<?php echo get_theme_mod('bonfire_pageloader_close_color'); ?>; }
        .bonfire-pageloader-dots .dots-one,
        .bonfire-pageloader-dots .dots-two,
        .bonfire-pageloader-dots .dots-three { background-color:<?php echo get_theme_mod('bonfire_pageloader_dots_color'); ?>; }
        /* loading dots */
        .bonfire-pageloader-dots { transform:scale(<?php echo get_theme_mod('bonfire_pageloader_dots_scale'); ?>); }
        /* use theme font */
        .bonfire-pageloader-sentence,
        .close-pageloader { font-family:<?php echo get_theme_mod('bonfire_pageloader_theme_font'); ?>; }
        /* progress bar */
        #nprogress-wrapper { padding:<?php echo get_theme_mod('bonfire_pageloader_progressbar_padding'); ?>px; max-width:<?php if( get_theme_mod('bonfire_pageloader_progressbar_width') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_width'); ?>px<?php } else { ?>100%<?php } ?>; }
        #nprogress { background-color:<?php echo get_theme_mod('bonfire_pageloader_progressbar_background_color'); ?>; height:<?php if( get_theme_mod('bonfire_pageloader_progressbar_height') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_height'); ?><?php } else { ?>3<?php } ?>px; }
        /* progress bar colors (regular and gradient) */
        #nprogress .bar {
            background:<?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?>;
            background:-moz-linear-gradient(left, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?> 0%, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color_gradient') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color_gradient'); ?><?php } else { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } ?> 100%);
            background:-webkit-gradient(left top, right top, color-stop(0%, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?>), color-stop(100%, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color_gradient') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color_gradient'); ?><?php } else { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } ?>));
            background:-webkit-linear-gradient(left, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?> 0%, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color_gradient') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color_gradient'); ?><?php } else { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } ?> 100%);
            background:-o-linear-gradient(left, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?> 0%, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color_gradient') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color_gradient'); ?><?php } else { ?>white<?php } ?> 100%);
            background:-ms-linear-gradient(left, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?> 0%, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color_gradient') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color_gradient'); ?><?php } else { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } ?> 100%);
            background:linear-gradient(to right, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?> 0%, <?php if( get_theme_mod('bonfire_pageloader_progressbar_color_gradient') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color_gradient'); ?><?php } else { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } ?> 100%);
            filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php if( get_theme_mod('bonfire_pageloader_progressbar_color') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } else { ?>white<?php } ?>', endColorstr='<?php if( get_theme_mod('bonfire_pageloader_progressbar_color_gradient') != '') { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color_gradient'); ?><?php } else { ?><?php echo get_theme_mod('bonfire_pageloader_progressbar_color'); ?><?php } ?>', GradientType=1 );
        }
        <?php if( get_theme_mod('bonfire_pageloader_progressbar_bottom') != '') { ?>
        #nprogress-wrapper { top:auto; bottom:0; }
        <?php } ?>
        <?php if( get_theme_mod('bonfire_pageloader_progressbar_below_icon') != '') { ?>
        #nprogress-wrapper {
            position:absolute;
            top:auto;
            bottom:auto;
        }
        <?php } else { ?>
        <?php } ?>
        /* hide nProgress if PageLoader disabled (singular) */
        <?php if(is_singular() ) { ?>
        <?php $meta_value = get_post_meta( get_the_ID(), 'bonfire_pageloader_display', true ); if( !empty( $meta_value ) ) { ?>
        #nprogress { display:none !important; }
        <?php } ?>
        <?php } ?>
		</style>
		<!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->
	
    <?php } $_SESSION['pageloader_session_customizer']++; ?>
    
	<?php
	}
	add_action('wp_head','bonfire_pageloader_header_customize');
    
    //
	// Add 'Settings' link to plugin page
	//
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );
    function add_action_links ( $links ) {
        $mylinks = array(
        '<a href="' . admin_url( 'customize.php?autofocus[panel]=pageloader_panel' ) . '">Settings</a>',
        );
    return array_merge( $links, $mylinks );
    }

	///////////////////////////////////////
	// Yes/No drop-down selector on 'write post/page' pages
	///////////////////////////////////////
	add_action( 'add_meta_boxes', 'bonfire_pageloader_custom_class_add' );
	function bonfire_pageloader_custom_class_add() {
		add_meta_box( 'bonfire-pageloader-meta-box-id', __( 'Show PageLoader loading screen on this post?', 'bonfire' ), 'bonfire_pageloader_custom_class', 'post', 'normal', 'high' );
		add_meta_box( 'bonfire-pageloader-meta-box-id', __( 'Show PageLoader loading screen on this page?', 'bonfire' ), 'bonfire_pageloader_custom_class', 'page', 'normal', 'high' );
	}

	function bonfire_pageloader_custom_class( $post ) {
		$values = get_post_custom( $post->ID );
		$bonfire_pageloader_selected_class = isset( $values['bonfire_pageloader_display'] ) ? esc_attr( $values['bonfire_pageloader_display'][0] ) : '';
		?>		
		<p>
			<select name="bonfire_pageloader_display">
				<option value="" <?php selected( $bonfire_pageloader_selected_class, 'yes' ); ?>>Yes</option>
				<!-- You can add and remove options starting from here -->				
				<option value="pageloader-hide" <?php selected( $bonfire_pageloader_selected_class, 'pageloader-hide' ); ?>>No</option>
				<!-- Options end here -->	
			</select>		
		</p>
		<?php	
	}

	add_action( 'save_post', 'bonfire_pageloader_custom_class_save' );
	function bonfire_pageloader_custom_class_save( $post_id ) {
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_post' ) ) {
			return;
		}
			
		if( isset( $_POST['bonfire_pageloader_display'] ) ) {
			update_post_meta( $post_id, 'bonfire_pageloader_display', esc_attr( $_POST['bonfire_pageloader_display'] ) );
		}
	}

?>