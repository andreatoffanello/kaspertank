<?php

function aprimo_scripts() {
    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    function aprimo_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = '';

        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( "on", "Open Sans font: on or off", 'aprimo' ) ) {
            $fonts[] = "Open Sans:300,400,600";
        }

        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', "Poppins font: on or off", 'aprimo' ) ) {
            $fonts[] = "Poppins:300,400,500,600";
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

    wp_enqueue_style('aprimo-fonts', aprimo_fonts_url(), array(), null);
    wp_enqueue_style('bootstrap', APRIMO_DIR_VEND . '/bootstrap/bootstrap.css');
    wp_enqueue_style('font-awesome', APRIMO_DIR_FONT . '/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('owl-carousel', APRIMO_DIR_VEND . '/owl-carousel/owl.carousel.css');
    wp_enqueue_style('owl-theme', APRIMO_DIR_VEND . '/owl-carousel/owl.theme.css');
    wp_enqueue_style('animate', APRIMO_DIR_VEND . '/WOW-master/css/libs/animate.css');
    wp_enqueue_style('aprimo-flaticon', APRIMO_DIR_FONT . '/icon/font/flaticon.css');
    wp_enqueue_style('fancybox', APRIMO_DIR_VEND . '/fancybox/dist/jquery.fancybox.min.css');
    wp_enqueue_style('snazzy-info-window', APRIMO_DIR_VEND . '/sanzzy-map/dist/snazzy-info-window.min.css');
    wp_enqueue_style('aprimo-wpd-style', APRIMO_DIR_CSS . '/wpd-style.css');
    wp_enqueue_style('aprimo-style', APRIMO_DIR_CSS . '/style.css');
    wp_enqueue_style('aprimo-responsive', APRIMO_DIR_CSS . '/responsive.css');
    wp_enqueue_style('aprimo-root', get_stylesheet_uri() );

    $dynamic_css = ".inner-page-banner {
                        background: url(".esc_url(get_the_post_thumbnail_url()).") no-repeat center;
                        background-size: cover;
                        background-attachment: fixed;
                        position: relative;
                    }";

    $page_margin_top = function_exists('cs_get_option') ? cs_get_option('page_margin_top') : '';
    $titlebar_padding = function_exists('cs_get_option') ? cs_get_option('titlebar_padding') : '';
    $titlebar_overlay_color = function_exists('cs_get_option') ? cs_get_option('titlebar_overlay_color') : '';
    $footer_bg_color = function_exists('cs_get_option') ? cs_get_option('footer_bg_color') : '';
    $blog_header_bg = function_exists('cs_get_option') ? cs_get_option('blog_header_bg') : '';
    $blog_header_bg = wp_get_attachment_image_src($blog_header_bg, 'full');
    $blog_header_bg = isset($blog_header_bg[0]) ? $blog_header_bg[0] : '';
    if(function_exists('cs_get_option')) {
        if(is_home()) {
            $dynamic_css .= ".inner-page-banner {
                            background: url(".esc_url($blog_header_bg).") no-repeat center;
                            background-size: cover;
                            background-attachment: fixed;
                            position: relative;
                        }";
        }
        $dynamic_css .= "
                    .inner-page-banner {
                        margin-bottom: " . esc_attr($page_margin_top) . ";
                    }
                    footer {
                        background: " . esc_attr($footer_bg_color) . ";
                    }
                    .inner-page-banner .opacity {
                        background: " . esc_attr($titlebar_overlay_color) . ";
                        padding: " . esc_attr($titlebar_padding) . ";
                    }";
    }
    wp_add_inline_style('aprimo-root', $dynamic_css);

    // Scripts
    wp_enqueue_script( 'bootstrap', APRIMO_DIR_VEND . '/bootstrap/bootstrap.min.js', array('jquery'), '3.3.5', true );
    //wp_enqueue_script( 'aprimo-jquery.mobile.customized', APRIMO_DIR_VEND . '/Camera-master/scripts/jquery.mobile.customized.min.js', array('jquery'), '1.3', true );
    //wp_enqueue_script( 'jquery-easing', APRIMO_DIR_VEND . '/Camera-master/scripts/jquery.easing.1.3.js', array('jquery'), '1.3', true );
    //wp_enqueue_script( 'camera', APRIMO_DIR_VEND . '/Camera-master/scripts/camera.min.js', array('jquery'), '1.4.0', true );
    wp_enqueue_script( 'wow', APRIMO_DIR_VEND . '/WOW-master/dist/wow.min.js', array('jquery'), '1.1.3', true );
    wp_enqueue_script( 'tilt', APRIMO_DIR_VEND . '/tilt.js/src/tilt.jquery.js', array('jquery'), '1.1.3', true );
    wp_enqueue_script( 'validate', APRIMO_DIR_VEND . '/contact-form/validate.js', array('jquery'), '1.11.0', true );
    // particles Js
    wp_enqueue_script( 'owl-carousel', APRIMO_DIR_VEND . '/owl-carousel/owl.carousel.min.js', array('jquery'), '3.3', true );
    wp_enqueue_script( 'fancybox', APRIMO_DIR_VEND . '/fancybox/dist/jquery.fancybox.min.js', array('jquery'), '3.0.47', true );
    //wp_enqueue_script( 'particles', APRIMO_DIR_VEND . '/particles.js-master/particles.js', array('jquery'), '2.0.0', true );
    //wp_enqueue_script( 'particles-stats', APRIMO_DIR_VEND . '/particles.js-master/demo/js/lib/stats.js', array('jquery'), '2.0.0', true );
    //wp_enqueue_script( 'particles-app', APRIMO_DIR_VEND . '/particles.js-master/demo/js/app.js', array('jquery'), '2.0.0', true );

    // Map Scripts
    if(function_exists('cs_get_option')) {
        $map_api_key = function_exists('cs_get_option') ? cs_get_option('map_api') : '';
        wp_enqueue_script('aprimo-map-api', 'https://maps.googleapis.com/maps/api/js?key=' . esc_attr($map_api_key), array(), null, true);
        wp_enqueue_script('sanzzy-map', APRIMO_DIR_VEND . '/sanzzy-map/dist/snazzy-info-window.min.js', array(), null, true);
    }

    wp_enqueue_script( 'aprimo-theme', APRIMO_DIR_JS . '/theme.js"', array('jquery',), '1.0', true );

    $dynamic_js = "";
    $latitude = function_exists('cs_get_option') ? cs_get_option('latitude') : '';
    $longitude = function_exists('cs_get_option') ? cs_get_option('longitude') : '';
    $map_zoom = function_exists('cs_get_option') ? cs_get_option('map_zoom') : '';
    $map_address = function_exists('cs_get_option') ? cs_get_option('map_address') : '';
    $address_icon = function_exists('cs_get_option') ? cs_get_option('address_icon') : '';
    $address_icon = !empty($address_icon) ? $address_icon : APRIMO_DIR_IMG.'/logo.png';
    if(function_exists('cs_get_option')) {
       $dynamic_js .= '
       if (jQuery(\'.map-canvas\').length) {
            var mapStyle=[{featureType:"water",elementType:"geometry",stylers:[{color:"#e9e9e9"},{lightness:17}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#f5f5f5"},{lightness:20}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#ffffff"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#ffffff"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:16}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#f5f5f5"},{lightness:21}]},{featureType:"poi.park",elementType:"geometry",stylers:[{color:"#dedede"},{lightness:21}]},{elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#ffffff"},{lightness:16}]},{elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#333333"},{lightness:40}]},{elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#f2f2f2"},{lightness:19}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#fefefe"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#fefefe"},{lightness:17},{weight:1.2}]}];
            var map = new google.maps.Map(jQuery(\'.map-canvas\')[0], {
                zoom: '.esc_js($map_zoom).',
                styles: mapStyle,
                scrollwheel: false,
                center: new google.maps.LatLng('.esc_attr($latitude).', '.esc_attr($longitude).')
            });
            var marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng('.esc_attr($latitude).', '.esc_attr($longitude).')
            });
            var info = new SnazzyInfoWindow({
                marker: marker,
                content:
                         \'<p> '.wp_kses_post($map_address).' </p>\',
                closeOnMapClick: false
            });
            info.open();
       }';

       $is_mc_form = cs_get_option('is_mc_form');
       $form_action = cs_get_option('mc_form_action');

    }

    wp_add_inline_script('aprimo-theme', $dynamic_js);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'aprimo_scripts');